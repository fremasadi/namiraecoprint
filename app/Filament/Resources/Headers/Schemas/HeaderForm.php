<?php

namespace App\Filament\Resources\Headers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class HeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo_path')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('logos')
                    ->maxSize(2048)
                    ->visibility('public')
                    ->openable()
                    ->downloadable()
                    ->previewable(true)
                    ->deletable(true)
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'image/webp']),

                TextInput::make('site_name')
                    ->label('Nama')
                    ->required(),

                TextInput::make('tagline')
                    ->label('TagLine')
                    ->default(null),
            ]);
    }
}