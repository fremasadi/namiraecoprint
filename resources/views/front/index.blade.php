<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namira Ecoprint</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Header -->
    @include('front.partials.header')

    <!-- Hero Section -->
    @include('front.partials.hero')

    <!-- About Section -->
    @include('front.partials.about')

    <!-- News Section -->
    @include('front.partials.news')

    <!-- Gallery Section -->
    @include('front.partials.gallery')

    <!-- Footer -->
    @include('front.partials.footer')

    <!-- Modal -->
    @include('front.partials.modal')

    {{-- Inject data dari database ke JavaScript --}}
    <script>
        // Data Collections dari Database (sudah di-format di controller)
        window.collections = @json($collections);

        // Data News dari Database (sudah di-format di controller)
        window.newsData = @json($news);
    </script>

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
