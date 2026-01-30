<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section; // ✅ BENAR (Filament v4)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            /* ================= HERO CONTENT ================= */
            Section::make('Hero Content')
                ->schema([FileUpload::make('background_image')->label('Background Image')->image()->disk('public')->directory('heroes')->visibility('public')->required()->columnSpan('full'), TextInput::make('title')->label('Judul')->required(), Textarea::make('subtitle')->label('Deskripsi')->rows(3)->required()])
                ->columns(2)
                ->columnSpanFull(), // 🔥 INI YANG KURANG

            /* ================= HERO FEATURES ================= */
            Section::make('Hero Features')
                ->description('Badge kecil di hero section')
                ->schema([
                    Repeater::make('features')
                        ->relationship()
                        ->schema([TextInput::make('icon')->required(), TextInput::make('text')->required()])
                        ->orderable('sort_order')
                        ->maxItems(4) // 🔥 BATAS MAKSIMAL
                        ->columns(2),
                ])
                ->columnSpanFull(),
        ]);
    }
}
