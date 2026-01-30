<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collection;
use Illuminate\Support\Str;

class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        $baseDescription = <<<HTML
        Namira Ecoprint memiliki produk ecoprint dengan desain eksklusif. Didirikan pada tahun 2019 oleh Yayuk Eko Anustin.
        Kini sukses mendapat penghargaan UKM tahun 2019 oleh Yayuk Eko Anustin.

        Kami berkomitmen untuk memberikan inovasi terbesar dengan produk berkualitas desain dan pewarna alam.
        Setiap produk dihasilkan dengan seni berkualitas desain dan pewarna alam Indonesia, dan keselarasan terhadap lingkungan.

        <br><br><strong>Keunggulan Produk:</strong><br><br>
        <strong>01. DESAIN</strong> - Motif limited edition, setiap desain memiliki cerita dan makna.<br><br>
        <strong>02. KUALITAS</strong> - Bahan premium yang lembut dan nyaman.<br><br>
        <strong>03. PRODUK</strong> - Eksklusif dan ramah lingkungan.<br><br>
        <strong>04. INOVASI</strong> - Eksperimen dedaunan & bunga mengikuti tren fashion.
        HTML;

        $titles = ['Namira Ecoprint', 'Ecoprint Bordir Eksklusif', 'Ecoprint Premium Collection', 'Natural Dye Series', 'Limited Edition Ecoprint'];

        foreach ($titles as $index => $title) {
            Collection::create([
                'title' => $title,
                'short_desc' => 'Koleksi eksklusif ecoprint pertama di Indonesia dengan teknik bordir dan benang sulam.',
                'description' => $baseDescription,
                'image_path' => 'collections/01KG1TTS8BS0YTPDERMRBFMMPV.JPG', // dummy image
                'is_active' => true,
                'sort_order' => $index,
            ]);
        }
    }
}
