<?php

namespace App\Filament\Resources\Abouts;

use App\Filament\Resources\Abouts\Pages\EditAbout;
use App\Filament\Resources\Abouts\Schemas\AboutForm;
use App\Models\About;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;
    protected static ?string $navigationLabel = 'About Section';
    protected static UnitEnum|string|null $navigationGroup = 'CMS';
    protected static ?int $navigationSort = -98;

    public static function form(Schema $schema): Schema
    {
        return AboutForm::configure($schema);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => EditAbout::route('/'),
        ];
    }
}