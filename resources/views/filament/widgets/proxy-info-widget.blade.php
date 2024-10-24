<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between">
            <span class="text-sm font-medium">Proxy URL</span>
            <x-filament::button
                x-data=""
                x-on:click="
                    window.navigator.clipboard.writeText('{{ App\Filament\Resources\ApiKeyResource::$proxyUrl }}');
                    $dispatch('notify', { message: 'Copied to clipboard' })
                "
                size="sm"
            >
                Copy
            </x-filament::button>
        </div>
        <div class="mt-2 text-sm">
            {{ App\Filament\Resources\ApiKeyResource::$proxyUrl }}
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
