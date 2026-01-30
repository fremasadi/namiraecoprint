<section class="hero" id="home">
    <div class="hero-background">
        @if($hero?->background_image)
            <img src="{{ asset('storage/' . $hero->background_image) }}"
                 alt="{{ $hero->title ?? 'Namira Ecoprint Collection' }}">
        @else
            <img src="{{ asset('assets/DSC03412.JPG') }}"
                 alt="Namira Ecoprint Collection">
        @endif
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>{{ $hero?->title ?? 'Namira Ecoprint' }}</h1>
        <p>{{ $hero?->subtitle ?? 'Transforming nature into eco-friendly and beautiful fabrics for a better future. Handmade with heart for Earth.' }}</p>

        <div class="hero-features">
            @if($hero?->features && $hero->features->count() > 0)
                @foreach($hero->features as $feature)
                    <div class="feature-badge">{{ $feature->icon }} {{ $feature->text }}</div>
                @endforeach
            @else
                {{-- Fallback default features --}}
                <div class="feature-badge">✦ Exclusive Design</div>
                <div class="feature-badge">✦ Premium Material</div>
                <div class="feature-badge">✦ Innovation & Tradition</div>
                <div class="feature-badge">✦ Sustainable Fashion</div>
            @endif
        </div>
    </div>
    <div class="scroll-indicator">
        <span></span>
    </div>
</section>