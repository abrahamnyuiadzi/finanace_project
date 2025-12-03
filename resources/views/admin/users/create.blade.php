@extends('layout.app')

@section('content')

<h2>Créer un utilisateur</h2>

{{-- Message de succès --}}
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

{{-- Erreurs --}}
@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    <label>Nom</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Rôle</label><br>
    <select name="role" required>
        <option value="accountant">Comptable</option>
        <option value="employee">Employé</option>
    </select><br><br>

    <label>Mot de passe</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Créer l'utilisateur</button>
</form>

@endsection
