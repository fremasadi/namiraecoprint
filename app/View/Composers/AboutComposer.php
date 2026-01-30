<?php

namespace App\View\Composers;

use App\Models\About;
use Illuminate\View\View;

class AboutComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Cache untuk performance (1 jam)
        $about = cache()->remember('active_about', 3600, function () {
            return About::with('features')
                ->where('is_active', true)
                ->first();
        });

        // Fallback data jika belum ada di database
        if (!$about) {
            $about = $this->getDefaultAboutData();
        }

        $view->with('about', $about);
    }

    /**
     * Default about data sebagai fallback
     */
    private function getDefaultAboutData(): object
    {
        return (object) [
            'title' => 'Tentang Namira Ecoprint',
            'paragraph_1' => 'Namira Ecoprint adalah brand fashion ramah lingkungan yang menghadirkan keindahan alam Indonesia melalui teknik ecoprint. Setiap produk kami dibuat dengan penuh cinta dan kepedulian terhadap kelestarian lingkungan.',
            'paragraph_2' => 'Kami percaya bahwa fashion yang indah tidak harus merusak bumi. Dengan menggunakan bahan-bahan alami dan proses yang berkelanjutan, kami menciptakan karya yang unik dan bermakna untuk masa depan yang lebih baik.',
            'image_path' => null,
            'is_active' => true,
            'features' => collect([
                (object) [
                    'icon' => '🌿',
                    'title' => '100% Natural',
                    'description' => 'Menggunakan bahan alami dari daun dan tumbuhan',
                    'sort_order' => 1
                ],
                (object) [
                    'icon' => '♻️',
                    'title' => 'Eco-Friendly',
                    'description' => 'Proses produksi ramah lingkungan tanpa bahan kimia berbahaya',
                    'sort_order' => 2
                ],
                (object) [
                    'icon' => '🎨',
                    'title' => 'Handmade',
                    'description' => 'Setiap produk dibuat dengan tangan oleh pengrajin berpengalaman',
                    'sort_order' => 3
                ],
                (object) [
                    'icon' => '✨',
                    'title' => 'Unique Design',
                    'description' => 'Setiap motif adalah unik dan tidak ada yang sama persis',
                    'sort_order' => 4
                ],
            ])
        ];
    }
}