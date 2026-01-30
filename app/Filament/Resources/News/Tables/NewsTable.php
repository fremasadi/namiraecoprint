<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->label('Gambar'),
                TextColumn::make('category')->label('Kategori')->searchable(),

                TextColumn::make('title')->label('Judul')->searchable(),

                TextColumn::make('short_desc')->label('Deskripsi Singkat')->searchable()->limit(20), // maksimal 50 karakter, sisanya jadi "..."

                TextColumn::make('content')->label('Isi Berita')->searchable()->limit(30), // maksimal 100 karakter

                // TextColumn::make('published_at')
                //     ->label('Tanggal Publikasi')
                //     ->date()
                //     ->sortable(),

                // TextColumn::make('author')->label('Penulis')->searchable(),

                TextColumn::make('created_at')->label('Tanggal Dibuat')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([EditAction::make()]);
    }
}
