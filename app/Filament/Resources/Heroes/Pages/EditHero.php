<?php

namespace App\Filament\Resources\Heroes\Pages;

use App\Filament\Resources\Heroes\HeroResource;
use App\Models\Hero;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Artisan;

class EditHero extends EditRecord
{
    protected static string $resource = HeroResource::class;

    protected static ?string $title = 'Edit Hero';

    public function mount(int|string|null $record = null): void
    {
        $hero = Hero::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Namira Ecoprint',
                'subtitle' => 'Transforming nature into eco-friendly and beautiful fabrics...',
                'is_active' => true,
            ],
        );

        $this->record = $hero;

        parent::mount($hero->getKey());
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
