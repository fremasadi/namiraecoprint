<?php

namespace Database\Seeders;

use App\Models\FooterSetting;
use Illuminate\Database\Seeder;

class FooterSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterSetting::firstOrCreate(
            ['id' => 1],
            [
                'about_text' => 'Pelopor ecoprint bordir dan ecoprint benang sulam pertama di Indonesia. Kami berkomitmen untuk menghadirkan produk fashion berkelanjutan dengan kualitas terbaik yang dibuat dengan tangan dan cinta untuk bumi.',

                'boutique_name' => 'Namira Ecoprint Boutique',

                'address' => 'Jl. Wisma Kedung Asem Indah G/7
Kelurahan Kedung Baruk
Kecamatan Rungkut, Surabaya
Jawa Timur, Indonesia',

                'maps_url' => 'https://goo.gl/maps/example', // Ganti dengan URL Google Maps asli

                'phones' => [
                    [
                        'number' => '0812 3537 106',
                        'label' => 'WhatsApp',
                        'url' => 'https://wa.me/6281235371106',
                        'is_whatsapp' => true,
                    ],
                    [
                        'number' => '081 1311 7106',
                        'label' => 'Phone',
                        'url' => 'tel:+628113117106',
                        'is_whatsapp' => false,
                    ],
                ],

                'shop_locations' => [
                    [
                        'name' => 'Novotel Samator Surabaya',
                        'type' => 'Hotel',
                        'address' => 'Jl. HR Muhammad No.1, Surabaya',
                        'url' => 'https://goo.gl/maps/novotel',
                    ],
                    [
                        'name' => 'Surabaya Kriya Gallery Siola',
                        'type' => 'Gallery',
                        'address' => 'Gedung Siola, Surabaya',
                        'url' => 'https://goo.gl/maps/siola',
                    ],
                    [
                        'name' => 'Hotel Majapahit Surabaya',
                        'type' => 'Hotel',
                        'address' => 'Jl. Tunjungan No.65, Surabaya',
                        'url' => 'https://www.hotelmajapahit.com',
                    ],
                    [
                        'name' => 'Hotel Grand Mercure Surabaya',
                        'type' => 'Hotel',
                        'address' => 'Jl. Raya Darmo No.87-89, Surabaya',
                        'url' => 'https://grandmercure-surabaya.com',
                    ],
                ],

                'online_stores' => [
                    [
                        'platform' => 'Tokopedia',
                        'name' => 'Namira Ecoprint Official',
                        'url' => 'https://tokopedia.com/namiraecoprint',
                    ],
                    [
                        'platform' => 'Shopee',
                        'name' => 'Namira Ecoprint',
                        'url' => 'https://shopee.co.id/namiraecoprint',
                    ],
                ],

                'social_media' => [
                    [
                        'platform' => 'Instagram',
                        'username' => '@namira.ecoprint',
                        'url' => 'https://instagram.com/namira.ecoprint',
                        'icon' => 'fa-instagram',
                    ],
                    [
                        'platform' => 'Facebook',
                        'username' => 'Namira Ecoprint',
                        'url' => 'https://facebook.com/namiraecoprint',
                        'icon' => 'fa-facebook',
                    ],
                    [
                        'platform' => 'Website',
                        'username' => 'www.namiraecoprint.id',
                        'url' => 'https://www.namiraecoprint.id',
                        'icon' => 'fa-globe',
                    ],
                ],

                'copyright_text' => 'Made in Indonesia with Love. All rights reserved.',
            ],
        );
    }
}
