<header>
    <div class="header-content">
        <div class="logo">
            <div class="logo-icon">
                @if ($header?->logo_path)
                    <img src="{{ asset('storage/' . $header->logo_path) }}" alt="{{ $header->site_name ?? 'Logo' }}">
                @else
                    <img src="{{ asset('assets/logonobackground.png') }}"
                        alt="{{ $header->site_name ?? 'Namira ' }}">
                @endif
            </div>
            <div>
                @if($header?->site_name)
                    <span class="logo-text">{{ $header->site_name }}</span>
                @endif
                @if ($header?->tagline)
                <div class="tagline">{{ $header->tagline}}</div>
                @endif
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home" class="nav-link">Beranda</a></li>
                <li><a href="#about" class="nav-link">Tentang</a></li>
                <li><a href="#news" class="nav-link">Berita</a></li>
                <li><a href="#collections" class="nav-link">Koleksi</a></li>
                <li><a href="#contact" class="nav-link">Kontak</a></li>
            </ul>

            <!-- Mobile Menu Toggle -->
            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>

    <!-- Mobile Overlay -->
    <div class="nav-overlay" id="navOverlay"></div>
</header>
