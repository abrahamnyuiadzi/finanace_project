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
<script>
    const toggleBtn = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.responsive-sidebar');
    const mainWrapper = document.querySelector('.main-wrapper');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        mainWrapper.classList.toggle('shifted');
    });

    // Clic en dehors du sidebar pour le fermer
    document.addEventListener('click', (e) => {
        if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
            sidebar.classList.remove('show');
            mainWrapper.classList.remove('shifted');
        }
    });
</script>


</body>
</html>
