<?php

namespace App\Filament\Resources\DocumentationResource\Pages;

use App\Filament\Resources\DocumentationResource;
use Filament\Resources\Pages\Page;

class ViewDocumentation extends Page
{
    protected static string $resource = DocumentationResource::class;

    protected static string $view = 'filament.resources.documentation.pages.view-documentation';

    public function getTitle(): string
    {
        return 'Documentation';
    }
}
