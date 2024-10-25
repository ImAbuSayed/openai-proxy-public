<x-filament::page>
    <div class="prose max-w-none dark:prose-invert">
        <div class="space-y-8">
            <h1 class="text-3xl font-bold tracking-tight">OpenAI Proxy API Documentation</h1>

            <!-- Overview Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold">Overview</h2>
                </div>
                <div class="px-6 py-4">
                    <p>This API proxy service provides secure access to OpenAI's API endpoints while maintaining region-specific requirements. It supports Chat Completions, Text-to-Speech (TTS), and Speech-to-Text (Whisper) functionalities.</p>
                </div>
            </div>

            <!-- Authentication Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold">Authentication</h2>
                </div>
                <div class="px-6 py-4">
                    <p>All API requests require an API key to be included in the headers:</p>
                    <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                        <code>
                            X-API-Key: your_api_key_here<br>
                            Content-Type: application/json
                        </code>
                    </div>
                </div>
            </div>

            <!-- Endpoints Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold">Endpoints</h2>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <!-- Chat Completion Endpoint -->
                    <div>
                        <h3 class="text-lg font-semibold">1. Chat Completion</h3>
                        <p><strong>POST</strong> <code>/api/openai-proxy/chat</code></p>
                        <p>Proxies requests to OpenAI's chat completion API.</p>
                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                            <p><strong>Request Body:</strong></p>
                            <pre>
{
    "model": "gpt-3.5-turbo",
    "messages": [
        {"role": "system", "content": "You are a helpful assistant."},
        {"role": "user", "content": "Hello!"}
    ],
    "temperature": 0.7
}
                            </pre>
                        </div>
                    </div>

                    <!-- Text-to-Speech (TTS) Endpoint -->
                    <div>
                        <h3 class="text-lg font-semibold">2. Text-to-Speech (TTS)</h3>
                        <p><strong>POST</strong> <code>/api/openai-proxy/speech</code></p>
                        <p>Converts text to speech using OpenAI's TTS API.</p>
                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                            <p><strong>Request Body:</strong></p>
                            <pre>
{
    "model": "tts-1-hd",
    "input": "Hello, how are you?",
    "voice": "alloy"
}
                            </pre>
                        </div>
                    </div>

                    <!-- Speech-to-Text (Whisper) Endpoint -->
                    <div>
                        <h3 class="text-lg font-semibold">3. Speech-to-Text (Whisper)</h3>
                        <p><strong>POST</strong> <code>/api/openai-proxy/transcription</code></p>
                        <p>Transcribes audio to text using OpenAI's Whisper API.</p>
                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                            <p><strong>Request Body:</strong></p>
                            <pre>
{
    "model": "whisper-1",
    "audio": "base64_encoded_audio_data",
    "language": "en"  // optional
}
                            </pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error Handling Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold">Error Handling</h2>
                </div>
                <div class="px-6 py-4">
                    <p>The API returns standard HTTP status codes and JSON error responses:</p>
                    <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                        <pre>
{
    "error": "Error message description"
}
                        </pre>
                    </div>
                </div>
            </div>

            <!-- Rate Limiting Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold">Rate Limiting</h2>
                </div>
                <div class="px-6 py-4">
                    <p>Rate limiting is inherited from OpenAI's API limits. Monitor your usage to avoid exceeding these limits.</p>
                </div>
            </div>

            <!-- Example Usage Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold">Example Usage</h2>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <!-- JavaScript Example -->
                    <div>
                        <h3 class="text-lg font-semibold">JavaScript Example</h3>
                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                            <pre>
const response = await fetch('https://your-domain.com/api/openai-proxy/chat', {
    method: 'POST',
    headers: {
        'X-API-Key': 'your_api_key_here',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        model: 'gpt-3.5-turbo',
        messages: [
            {role: 'user', content: 'Hello!'}
        ]
    })
});
const data = await response.json();
console.log(data);
                            </pre>
                        </div>
                    </div>

                    <!-- Python Example -->
                    <div>
                        <h3 class="text-lg font-semibold">Python Example</h3>
                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                            <pre>
import requests

url = 'https://your-domain.com/api/openai-proxy/chat'
headers = {
    'X-API-Key': 'your_api_key_here',
    'Content-Type': 'application/json',
}
data = {
    'model': 'gpt-3.5-turbo',
    'messages': [
        {'role': 'user', 'content': 'Hello!'}
    ]
}

response = requests.post(url, headers=headers, json=data)
print(response.json())
                            </pre>
                        </div>
                    </div>

                    <!-- PHP Example -->
                    <div>
                        <h3 class="text-lg font-semibold">PHP Example</h3>
                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                            <pre>
$client = new \GuzzleHttp\Client();
$response = $client->post('https://your-domain.com/api/openai-proxy/chat', [
    'headers' => [
        'X-API-Key' => 'your_api_key_here',
        'Content-Type' => 'application/json',
    ],
    'json' => [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'Hello!']
        ]
    ]
]);

$data = json_decode($response->getBody(), true);
print_r($data);
                            </pre>
                        </div>
                    </div>

                    <!-- cURL Example -->
                    <div>
                        <h3 class="text-lg font-semibold">cURL Example</h3>
                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg font-mono text-sm overflow-x-auto">
                            <pre>
curl -X POST https://your-domain.com/api/openai-proxy/chat \
-H "X-API-Key: your_api_key_here" \
-H "Content-Type: application/json" \
-d '{
    "model": "gpt-3.5-turbo",
    "messages": [
        {"role": "user", "content": "Hello!"}
    ]
}'
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament::page>
