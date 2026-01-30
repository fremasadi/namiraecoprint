<?php

namespace App\View\Composers;

use App\Models\Hero;
use Illuminate\View\View;

class HeroComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Cache untuk performance (1 jam)
        $hero = cache()->remember('active_hero', 3600, function () {
            return Hero::with('features')
                ->where('is_active', true)
                ->first();
        });

        // Fallback data jika belum ada di database
        if (!$hero) {
            $hero = $this->getDefaultHeroData();
        }

        $view->with('hero', $hero);
    }

    /**
     * Default hero data sebagai fallback
     */
    private function getDefaultHeroData(): object
    {
        return (object) [
            'background_image' => 'assets/hero-bg.jpg',
            'title' => 'Namira Ecoprint',
            'subtitle' => 'The Harmony of Indonesian Nature',
            'is_active' => true,
            'features' => collect([
                (object) [
                    'icon' => '🌿',
                    'text' => '100% Natural',
                    'sort_order' => 1
                ],
                (object) [
                    'icon' => '♻️',
                    'text' => 'Eco-Friendly',
                    'sort_order' => 2
                ],
                (object) [
                    'icon' => '🎨',
                    'text' => 'Handmade',
                    'sort_order' => 3
                ],
            ])
        ];
    }
}