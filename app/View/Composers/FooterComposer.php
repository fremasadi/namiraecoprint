<?php

namespace App\View\Composers;

use App\Models\FooterSetting;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * Bind footer data to the view.
     */
    public function compose(View $view): void
    {
        // Cache footer untuk 1 jam supaya tidak query setiap request
        $footer = cache()->remember('site_footer', 3600, function () {
            return FooterSetting::first();
        });

        $view->with('footer', $footer);
    }
}