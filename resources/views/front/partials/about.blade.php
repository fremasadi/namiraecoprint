<section class="about-section" id="about">
    <div class="about-content">
        <div class="about-text">
            <h2>{{ $about?->title ?? 'Pelopor  di Indonesia' }}</h2>
            <p>{{ $about?->paragraph_1 ?? 'Namira Ecoprint adalah pelopor ecoprint bordir dan ecoprint benang sulam pertama di Indonesia. Didirikan pada tahun 2019 oleh Yayuk Eko Anustin, kami berkomitmen menghadirkan produk fashion berkelanjutan dengan kualitas terbaik.' }}</p>
            <p>{{ $about?->paragraph_2 ?? 'Setiap produk kami dibuat dengan tangan menggunakan bahan alami berkualitas tinggi, menggabungkan teknik tradisional dengan inovasi modern untuk menciptakan karya seni yang unik dan ramah lingkungan.' }}</p>

            <div class="about-features">
                @if($about?->features && $about->features->count() > 0)
                    @foreach($about->features as $feature)
                        <div class="about-feature">
                            <h4>{{ $feature->icon }} {{ $feature->title }}</h4>
                            <p>{{ $feature->description }}</p>
                        </div>
                    @endforeach
                @else
                    {{-- Fallback default features --}}
                    <div class="about-feature">
                        <h4>🌿 100% Natural</h4>
                        <p> dari bahan alam tanpa kimia berbahaya</p>
                    </div>
                    <div class="about-feature">
                        <h4>🌍 Go International</h4>
                        <p>Ekspor ke Kanada, Arab Saudi, Thailand & lainnya</p>
                    </div>
                    <div class="about-feature">
                        <h4>🎨 Limited Edition</h4>
                        <p>Setiap desain unik dan tidak dapat direplikasi</p>
                    </div>
                    <div class="about-feature">
                        <h4>♻️ Sustainable</h4>
                        <p>Proses ramah lingkungan & bahan daur ulang</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="about-image">
            @if($about?->image_path)
                <img src="{{ asset('storage/' . $about->image_path) }}"
                     alt="{{ $about->title ?? 'Namira Ecoprint Products' }}">
            @else
                <img src="{{ asset('assets/herosection.JPG') }}"
                     alt="Namira Ecoprint Products">
            @endif
        </div>
    </div>
</section>