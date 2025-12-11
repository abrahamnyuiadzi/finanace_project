@extends('layout.app')

@section('content')

<h2 class="userform-title">Créer un utilisateur</h2>

{{-- Message de succès --}}
@if(session('success'))
    <div class="userform-alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Erreurs --}}
@if($errors->any())
    <div class="userform-alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.users.store') }}" method="POST" class="userform-form">
    @csrf

    <div class="userform-group">
        <label>Nom</label>
        <input type="text" name="name" required value="{{ old('name') }}">
    </div>

    <div class="userform-group">
        <label>Email</label>
        <input type="email" name="email" required value="{{ old('email') }}">
    </div>

    <div class="userform-group">
        <label>Rôle</label>
        <select name="role" required>
            <option value="accountant" {{ old('role') == 'accountant' ? 'selected' : '' }}>Comptable</option>
            <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employé</option>
        </select>
    </div>

    <div class="userform-group">
        <label>Mot de passe</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit" class="userform-btn-submit">Créer l'utilisateur</button>
    <a href="{{ route('admin.dashboard') }}" class="userform-btn-back">Retour</a>
</form>

@endsection
