<x-filament::widget>
    <x-filament::card>
        <div class="px-4 py-2">
            <h3 class="text-lg font-medium">API Endpoints</h3>
            <div class="mt-4 space-y-4">
                @foreach($this->getEndpoints() as $name => $url)
                    <div class="flex flex-col space-y-2">
                        <span class="text-sm font-medium text-gray-500">{{ $name }}:</span>
                        <div class="flex items-center space-x-2">
                            <pre class="flex-1 p-2 rounded text-sm">{{ $url }}</pre>
                        </div>
                    </div>
                @endforeach
                <h4 class="text-sm text-start font-medium text-gray-500">Required Headers:</h4>
                <div class="text-start">
                        X-API-Key: your_api_key_here and 
                        Content-Type: application/json
                </div>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
