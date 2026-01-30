<?php

namespace App\Filament\Resources\Heroes;

use App\Filament\Resources\Heroes\Pages\EditHero;
use App\Filament\Resources\Heroes\Schemas\HeroForm;
use App\Models\Hero;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationLabel = 'Hero Section';
    protected static ?int $navigationSort = -99;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';
    protected static UnitEnum|string|null $navigationGroup = 'CMS';

    public static function form(Schema $schema): Schema
    {
        return HeroForm::configure($schema);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => EditHero::route('/'),
        ];
    }
}