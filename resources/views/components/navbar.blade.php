<nav class="navbar">
    <div class="nav-right">

        @guest
            <a href="{{ route('login') }}" class="btn-login">Connexion</a>
        @endguest

        @auth
            <span>{{ auth()->user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn-logout">Déconnexion</button>
            </form>
        @endauth

    </div>
</nav>
