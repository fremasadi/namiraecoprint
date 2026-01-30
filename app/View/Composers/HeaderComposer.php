<?php

namespace App\View\Composers;

use App\Models\Header;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Cache untuk performance (1 jam)
        $header = cache()->remember('site_header', 3600, function () {
            return Header::first();
        });

        // Fallback data jika belum ada di database
        if (!$header) {
            $header = (object) [
                'site_name' => 'Namira ',
                'logo_path' => null,
                'tagline' => 'The Harmony of  Nature'
            ];
        }

        $view->with('header', $header);
    }
}