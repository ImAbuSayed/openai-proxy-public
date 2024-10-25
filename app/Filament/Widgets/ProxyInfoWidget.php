<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ApiKeyResource;
use Filament\Widgets\Widget;

class ProxyInfoWidget extends Widget
{
    protected static string $view = 'filament.widgets.proxy-info-widget';

    public static function canView(): bool
    {
        return true;
    }

    public function getEndpoints(): array
    {
        $baseUrl = config('app.url');
        return [
            'Chat Endpoint' => $baseUrl . '/api/openai-proxy/chat',
            'Speech (TTS) Endpoint' => $baseUrl . '/api/openai-proxy/speech',
            'Transcription (Whisper) Endpoint' => $baseUrl . '/api/openai-proxy/transcription',
        ];
    }
}
