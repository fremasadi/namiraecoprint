<?php

namespace App\Filament\Resources\Abouts\Pages;

use App\Filament\Resources\Abouts\AboutResource;
use App\Models\About;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Artisan;

class EditAbout extends EditRecord
    {
        protected static string $resource = AboutResource::class;

        protected static ?string $title = 'Edit About Section';

        public function mount(int|string|null $record = null): void
        {
            $about = About::firstOrCreate(
                ['id' => 1],
                [
                    'title' => 'Pelopor Ecoprint di Indonesia',
                    'paragraph_1' => 'Namira Ecoprint adalah pelopor ecoprint bordir...',
                    'paragraph_2' => 'Setiap produk kami dibuat dengan tangan...',
                    'is_active' => true,
                ]
            );

            $this->record = $about;

            parent::mount($about->getKey());
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