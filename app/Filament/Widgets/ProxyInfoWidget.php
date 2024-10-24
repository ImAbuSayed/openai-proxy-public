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
}
