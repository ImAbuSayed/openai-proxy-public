<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use OpenAI;

class OpenAIProxyController extends Controller
{
    public function proxyRequest(Request $request)
    {
        $apiKey = $request->header('X-API-Key');
        if (!$apiKey || !ApiKey::where('key', $apiKey)->exists()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $openaiApiKey = getenv('OPENAI_API_KEY');
        if (!$openaiApiKey) {
            return response()->json(['error' => 'OpenAI API key not configured'], 500);
        }

        $client = OpenAI::client($openaiApiKey);

        try {
            $response = $client->chat()->create($request->all());
            return response()->json($response->toArray());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
