{{-- resources/views/front/partials/footer.blade.php --}}

<footer id="contact">
    <div class="footer-content">
        {{-- About Section --}}
        <div class="footer-section">
            <h3>Tentang Namira Ecoprint</h3>
            <p>{{ $footer->about_text ?? 'Pelopor ecoprint bordir dan ecoprint benang sulam pertama di Indonesia. Kami berkomitmen untuk menghadirkan produk fashion berkelanjutan dengan kualitas terbaik yang dibuat dengan tangan dan cinta untuk bumi.' }}</p>
        </div>

        {{-- Boutique Location --}}
        <div class="footer-section">
            <h3>Lokasi Boutique</h3>
            @if($footer && $footer->boutique_name)
                <p><strong>{{ $footer->boutique_name }}</strong></p>
            @endif

            @if($footer && $footer->address)
                <p>{!! nl2br(e($footer->address)) !!}</p>
            @else
                <p>
                    Jl. Wisma Kedung Asem Indah G/7<br>
                    Kelurahan Kedung Baruk<br>
                    Kecamatan Rungkut, Surabaya<br>
                    Jawa Timur, Indonesia
                </p>
            @endif

            @if($footer && $footer->maps_url)
                <p style="margin-top: 0.5rem;">
                    <a href="{{ $footer->maps_url }}" target="_blank" rel="noopener" style="color: var(--gold); text-decoration: none;">
                        📍 Lihat di Google Maps
                    </a>
                </p>
            @endif

            {{-- Phone Numbers --}}
            @if($footer && $footer->phones && count($footer->phones) > 0)
                <p style="margin-top: 1rem;"><strong>Phone:</strong><br>
                    @foreach($footer->phones as $phone)
                        <a href="{{ $phone['url'] ?? 'tel:' . preg_replace('/[^0-9+]/', '', $phone['number']) }}"
                           style="color: #c0c0c0; text-decoration: none;">
                            {{ $phone['number'] }}
                            @if($phone['is_whatsapp'] ?? false)
                                <span style="color: var(--green);">📱</span>
                            @endif
                        </a>
                        @if($phone['label'] ?? false)
                            <span style="font-size: 0.85em; color: #888;">({{ $phone['label'] }})</span>
                        @endif
                        <br>
                    @endforeach
                </p>
            @else
                <p style="margin-top: 1rem;"><strong>Phone:</strong><br>0812 3537 106<br>081 1311 7106</p>
            @endif
        </div>

        {{-- Shop Locations --}}
        <div class="footer-section">
            <h3>Temukan Produk Kami</h3>
            @if($footer && $footer->shop_locations && count($footer->shop_locations) > 0)
                <p>
                    @foreach($footer->shop_locations as $location)
                        •
                        @if($location['url'] ?? false)
                            <a href="{{ $location['url'] }}" target="_blank" rel="noopener" style="color: #c0c0c0; text-decoration: none;">
                                {{ $location['name'] }}
                            </a>
                        @else
                            {{ $location['name'] }}
                        @endif
                        @if($location['type'] ?? false)
                            <span style="font-size: 0.85em; color: #888;">({{ $location['type'] }})</span>
                        @endif
                        <br>
                    @endforeach
                </p>
            @else
                <p>
                    • Novotel Samator Surabaya<br>
                    • Surabaya Kriya Gallery Siola<br>
                    • Hotel Majapahit Surabaya<br>
                    • Hotel Grand Mercure Surabaya
                </p>
            @endif
        </div>

        {{-- Connect With Us --}}
        <div class="footer-section">
            <h3>Connect With Us</h3>

            {{-- Online Stores --}}
            @if($footer && $footer->online_stores && count($footer->online_stores) > 0)
                <p>
                    <strong>Online Store:</strong><br>
                    @foreach($footer->online_stores as $store)
                        •
                        <a href="{{ $store['url'] }}" target="_blank" rel="noopener" style="color: #c0c0c0; text-decoration: none;">
                            {{ $store['name'] }}
                        </a>
                        @if($store['platform'] ?? false)
                            <span style="font-size: 0.85em; color: #888;">({{ $store['platform'] }})</span>
                        @endif
                        <br>
                    @endforeach
                </p>
            @else
                <p>
                    <strong>Online Store:</strong><br>
                    • Namira Ecoprint<br>
                    • Namira Ecoprint Official Store
                </p>
            @endif

            {{-- Social Media --}}
            @if($footer && $footer->social_media && count($footer->social_media) > 0)
                <p style="margin-top: 1rem;">
                    <strong>Social Media:</strong><br>
                    @foreach($footer->social_media as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener" style="color: #c0c0c0; text-decoration: none;">
                            @if($social['icon'] ?? false)
                                <i class="{{ $social['icon'] }}"></i>
                            @endif
                            {{ $social['platform'] }}: {{ $social['username'] }}
                        </a>
                        <br>
                    @endforeach
                </p>
            @else
                <p style="margin-top: 1rem;">
                    <strong>Social Media:</strong><br>
                    Instagram: @namira.ecoprint<br>
                    Website: www.namiraecoprint.id
                </p>
            @endif
        </div>
    </div>

    <div class="footer-bottom">
        <p>
            &copy; {{ date('Y') }} Namira Ecoprint.
            {{ $footer->copyright_text ?? 'Made in Indonesia with Love. All rights reserved.' }}
        </p>
    </div>
</footer>