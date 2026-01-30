<?php

namespace App\Filament\Resources\Collections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;

class CollectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->label('Judul')->required()->columnSpanFull(), // membuat input full width

            TextInput::make('short_desc')->label('Deskripsi Singkat')->required()->columnSpanFull(),

            RichEditor::make('description')
            ->label('Deskripsi')
            ->required()
            ->columnSpanFull()
            ->extraAttributes([
                'style' => 'min-height:300px;', // tinggi minimum editor
            ]),
            FileUpload::make('image_path')->label('Gambar')->image()->columnSpanFull(), // upload gambar juga full width jika mau
            // Toggle::make('is_active')->label('Status')->required(),
            // TextInput::make('sort_order')
            //     ->required()
            //     ->numeric()
            //     ->default(0),
        ]);
    }
}
