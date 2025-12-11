<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Finance App')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    @include('layout.sidebar')

    <div class="main-wrapper">
        @include('components.navbar')

        <main class="content">
            @yield('content')
        </main>
    </div>
<script src="{{ asset('js/sidebar.js') }}"></script>

</body>
</html>
