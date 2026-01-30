<?php

namespace App\Filament\Resources\Headers\Pages;

use App\Filament\Resources\Headers\HeaderResource;
use App\Models\Header;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Artisan;

class EditHeader extends EditRecord
{
    protected static string $resource = HeaderResource::class;

    protected static ?string $title = 'Edit Header';

    /**
     * Auto-load first header record
     * Create if doesn't exist
     */
    public function mount(int|string|null $record = null): void
    {
        $this->record = Header::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Namira Ecoprint',
                'tagline' => 'The Harmony of Indonesian Nature',
            ],
        );

        parent::mount($this->record->id); // ✅ Pass ID, bukan getKey()
    }

    /**
     * Hapus delete action karena kita tidak ingin header bisa dihapus
     */
    protected function getHeaderActions(): array
    {
        return [
                // DeleteAction::make(), // Hapus ini
            ];
    }

    /**
     * Custom success notification
     */
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Header berhasil diupdate!';
    }

    /**
     * Redirect after save - tetap di halaman yang sama
     */
    protected function getRedirectUrl(): ?string
    {
        return static::getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
    }
}
