<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            /* ================= ABOUT CONTENT ================= */
            Section::make('About Content')
                ->schema([
                    TextInput::make('title')->label('Judul')->required()->columnSpan('full'), // 🔥 FULL WIDTH

                    Textarea::make('paragraph_1')->label('Paragraf 1')->rows(4)->required()->columnSpan(1),

                    Textarea::make('paragraph_2')->label('Paragraf 2')->rows(4)->nullable()->columnSpan(1),

                    FileUpload::make('image_path')->label('Gambar About')->image()->disk('public')->directory('abouts')->visibility('public')->columnSpan('full'),
                ])
                ->columns(2)
                ->columnSpanFull(),

            /* ================= ABOUT FEATURES ================= */
            Section::make('About Features')
                ->description('Icon + teks keunggulan About section')
                ->schema([
                    Repeater::make('features')
                        ->relationship()
                        ->schema([TextInput::make('icon')->label('Icon')->placeholder('icon')->maxLength(10), TextInput::make('title')->label('Judul')->required(), TextInput::make('description')->label('Deskripsi')->required(), TextInput::make('sort_order')->numeric()->hidden()])
                        ->orderable('sort_order')
                        ->maxItems(4) // 🔥 BATAS MAKSIMAL
                        ->addActionLabel('Tambah Feature')
                        ->columns(2),
                ])
                ->columnSpanFull(),
        ]);
    }
}
