<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\Galery;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Cars', Car::count())
                ->description('All cars in system')
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('success'),

            Stat::make('Featured Cars', Car::where('is_featured', true)->count())
                ->description('Cars marked as featured')
                ->descriptionIcon('heroicon-o-star')
                ->color('warning'),

            Stat::make('Gallery Images', Galery::count())
                ->description('Total gallery images')
                ->descriptionIcon('heroicon-o-photo')
                ->color('info'),

            Stat::make('Car Images', CarImage::count())
                ->description('Total car images')
                ->descriptionIcon('heroicon-o-camera')
                ->color('primary'),
        ];
    }
}
