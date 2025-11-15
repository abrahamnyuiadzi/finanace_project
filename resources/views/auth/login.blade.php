@extends('layout.app')

@section('content')
    <h1>Connexion</h1>
    @if ($message = Session::get('success'))
        <h3>{{ $message }}</h3>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf

        <label for="email">E-mail</label><br>
        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Saisir l'e-mail ici ...">
        <br /><br />

        <label for="password">Mot de passe</label><br>
        <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ...">
        <br /><br />

        <button type="submit">
            Se connecter
        </button>
        <a href="{{route('auth.registration')}}"> s'enregitrer</a>
    </form>
@endsection