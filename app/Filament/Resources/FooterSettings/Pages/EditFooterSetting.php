<?php

namespace App\Filament\Resources\FooterSettings\Pages;

use App\Filament\Resources\FooterSettings\FooterSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Models\FooterSetting;
use Illuminate\Support\Facades\Artisan;

class EditFooterSetting extends EditRecord
{
    protected static string $resource = FooterSettingResource::class;

    protected static ?string $title = 'Edit Footer';

    public function mount(int|string|null $record = null): void
    {
        $footer = FooterSetting::firstOrCreate(
            ['id' => 1],
            [
                'about_text' => 'Pelopor ecoprint bordir dan ecoprint benang sulam pertama di Indonesia.',
                'boutique_name' => 'Namira Ecoprint Boutique',
                'address' => 'Jl. Wisma Kedung Asem Indah G/7, Surabaya',
                'phones' => [],
                'shop_locations' => [],
                'online_stores' => [],
                'social_media' => [],
                'copyright_text' => 'Made in Indonesia with Love. All rights reserved.',
            ]
        );

        $this->record = $footer;

        parent::mount($footer->getKey());
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Footer berhasil diupdate!';
    }

    protected function afterSave(): void
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
    }

    protected function getRedirectUrl(): ?string
    {
        return static::getResource()::getUrl('index');
    }
}
