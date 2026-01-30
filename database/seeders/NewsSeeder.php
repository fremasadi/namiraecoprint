<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $newsData = [
            [
                'category' => 'Event',
                'title' => 'Namira Ecoprint Hadir di Fashion Week Jakarta 2025',
                'short_desc' => 'Namira Ecoprint memukau para pengunjung Fashion Week Jakarta 2025 dengan koleksi terbaru yang menggabungkan teknik ecoprint tradisional dengan desain modern yang fashionable.',
                'content' => '<p>Namira Ecoprint berhasil mencuri perhatian di Fashion Week Jakarta 2025 dengan menampilkan koleksi terbaru yang memukau. Acara yang berlangsung di Jakarta Convention Center ini dihadiri oleh lebih dari 5000 pengunjung dan puluhan media nasional.<br><br>Koleksi yang ditampilkan mengusung tema &#039;Harmony of Nature&#039; dengan 30+ outfit eksklusif yang menggabungkan teknik ecoprint bordir dan benang sulam khas Namira Ecoprint. Setiap piece dibuat dengan dedikasi tinggi menggunakan bahan alami 100% dan pewarna dari daun-daunan pilihan.<br><br>Para fashion influencer dan buyer internasional memberikan respons yang sangat positif. Beberapa buyer dari Jepang dan Korea Selatan menunjukkan ketertarikan untuk membawa produk Namira Ecoprint ke negara mereka.<br><br><strong>Highlights acara:</strong><br>• 30+ outfit eksklusif dipamerkan<br>• 5000+ pengunjung hadir<br>• Media coverage dari 20+ outlet nasional<br>• Inquiry dari buyer internasional<br>• Fashion talk oleh founder Yayuk Eko Anustin</p>',
                'image_path' => '01KG1XFZ72S14QSEDV5YEQHCS8.JPG',
                'published_at' => null,
                'author' => null,
                'is_published' => 1,
                'sort_order' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // insert 5 data identik
        for ($i = 0; $i < 5; $i++) {
            DB::table('news')->insert($newsData[0]);
        }
    }
}