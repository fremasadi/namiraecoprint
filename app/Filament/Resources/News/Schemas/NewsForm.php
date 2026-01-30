<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('category')
                ->label('Kategori')
                ->options([
                    'Event' => 'Event',
                    'Achievement' => 'Achievement',
                    'Workshop' => 'Workshop',
                    'Lainnya' => 'Lainnya',
                ])
                ->required(),

            TextInput::make('title')->label('Judul')->required(),

            TextInput::make('short_desc')->label('Deskripsi Singkat')->required()->columnSpanFull(),

            RichEditor::make('content')
            ->label('Isi Berita')
            ->required()
            ->columnSpanFull()
            ->extraAttributes([
                'style' => 'min-height:300px;', // tinggi minimum editor
            ]),

            FileUpload::make('image_path')->label('Gambar')->image()->columnSpanFull(),

            TextInput::make('author')->label('Penulis')->default(fn() => auth()->user()?->name)->hidden(), // otomatis dari user login

            // Toggle::make('is_published')
            //     ->label('Publikasikan')
            //     ->required(),
        ]);
    }
}
