<?php

namespace App\Filament\Resources;

use App\Models\Documentation;
use Filament\Resources\Resource;
use App\Filament\Resources\DocumentationResource\Pages\ViewDocumentation;
use Filament\Navigation\NavigationItem;

class DocumentationResource extends Resource
{
    protected static ?string $model = Documentation::class; // Update this line
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Documentation';
    protected static ?string $slug = 'documentation';
    protected static ?int $navigationSort = 2;

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make(static::getNavigationLabel())
                ->icon(static::getNavigationIcon())
                ->url(static::getUrl())
                ->sort(static::$navigationSort),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ViewDocumentation::route('/'),
        ];
    }
}
