<?php

namespace App\Filament\Resources\Headers;

use App\Filament\Resources\Headers\Pages\EditHeader;
use App\Filament\Resources\Headers\Schemas\HeaderForm;
use App\Models\Header;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class HeaderResource extends Resource
{
    protected static ?string $model = Header::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-window';
    protected static ?string $navigationLabel = 'Header Section';
    protected static ?int $navigationSort = -100;

    protected static UnitEnum|string|null $navigationGroup = 'CMS';

    public static function form(Schema $schema): Schema
    {
        return HeaderForm::configure($schema);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => EditHeader::route('/'),
        ];
    }
}