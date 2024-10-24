<?php

namespace App\Filament\Resources\ApiKeyResource\Pages;

use App\Filament\Resources\ApiKeyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApiKey extends CreateRecord
{
    protected static string $resource = ApiKeyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['key'] = \App\Models\ApiKey::generateUniqueKey();

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'API key created successfully';
    }
}
