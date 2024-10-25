<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use OpenAI;
use Illuminate\Support\Facades\Storage;


class OpenAIProxyController extends Controller
{
    private function validateApiKey($request)
    {
        $apiKey = $request->header('X-API-Key');
        if (!$apiKey || !ApiKey::where('key', $apiKey)->exists()) {
            throw new \Exception('Unauthorized', 401);
        }

        $openaiApiKey = getenv('OPENAI_API_KEY');
        if (!$openaiApiKey) {
            throw new \Exception('OpenAI API key not configured', 500);
        }

        return OpenAI::client($openaiApiKey);
    }

    public function proxyChat(Request $request)
    {
        try {
            $client = $this->validateApiKey($request);
            $response = $client->chat()->create($request->all());
            return response()->json($response->toArray());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }

    public function proxySpeech(Request $request)
{
    try {
        $client = $this->validateApiKey($request);

        // Validate required parameters
        $request->validate([
            'input' => 'required|string',
            'model' => 'required|string',
            'voice' => 'required|string',
        ]);

        \Log::info('Received TTS request', [
            'input' => $request->input('input'),
            'model' => $request->input('model'),
            'voice' => $request->input('voice'),
        ]);

        // Generate speech
        $response = $client->audio()->speech([
            'model' => $request->input('model', 'tts-1-hd'),
            'input' => $request->input('input'),
            'voice' => $request->input('voice'),
            'response_format' => 'mp3',
        ]);

        // Check if the response is a string (audio content)
        if (is_string($response)) {
            $audioContent = $response;
        } else {
            // Get the audio content
            $audioContent = $response->getContent();
        }

        \Log::info('Generated TTS audio', [
            'audioContentLength' => strlen($audioContent),
        ]);

        // Return audio file with proper headers
        return response($audioContent)
            ->header('Content-Type', 'audio/mpeg')
            ->header('Content-Length', strlen($audioContent));
    } catch (\Exception $e) {
        \Log::error('Error generating TTS audio', [
            'error' => $e->getMessage(),
        ]);
        return response()->json(['error' => $e->getMessage()], $e->getCode() ?: 500);
    }
}

    public function proxyTranscription(Request $request)
    {
        try {
            $client = $this->validateApiKey($request);

            // Validate request
            $request->validate([
                'audio' => 'required|string', // Base64 encoded audio
                'model' => 'required|string',
                'language' => 'nullable|string',
            ]);

            // Decode base64 audio
            $audioData = base64_decode(preg_replace('#^data:audio/\w+;base64,#i', '', $request->input('audio')));

            // Create temporary file
            $tempFile = tempnam(sys_get_temp_dir(), 'audio_');
            file_put_contents($tempFile, $audioData);

            try {
                // Transcribe audio
                $response = $client->audio()->transcribe([
                    'model' => $request->input('model', 'whisper-1'),
                    'file' => fopen($tempFile, 'r'),
                    'language' => $request->input('language'),
                    'response_format' => 'verbose_json',
                ]);

                // Clean up temp file
                unlink($tempFile);

                return response()->json([
                    'text' => $response->text,
                    'language' => $response->language,
                    'duration' => $response->duration,
                    'segments' => $response->segments,
                ]);
            } finally {
                // Ensure temp file is cleaned up even if transcription fails
                if (file_exists($tempFile)) {
                    unlink($tempFile);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
