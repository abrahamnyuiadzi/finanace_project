@extends('layout.app')

@section('content')
<div class="login-container">
    <h1>Connexion</h1>

    {{-- Message de succès --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    {{-- Erreurs de validation --}}
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Saisir l'e-mail ici ..." required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ..." required>

        <button type="submit">Se connecter</button>

        {{-- <a href="{{ route('admin.users.create') }}">S'inscrire</a> --}}
    </form>
</div>
@endsection
