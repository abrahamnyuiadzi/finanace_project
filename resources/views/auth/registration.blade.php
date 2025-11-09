@extends('layout.app')

@section('content')
<div class="container mt-5 col-md-6">
    <div class="card shadow-lg rounded-4">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">Créer un compte</h3>

            {{-- Message de succès --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Erreurs de validation --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                {{-- Nom --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nom complet</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        placeholder="Entrez votre nom complet"
                        value="{{ old('name') }}" 
                        required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control" 
                        placeholder="exemple@mail.com"
                        value="{{ old('email') }}" 
                        required>
                </div>

                {{-- Mot de passe --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        placeholder="********"
                        required>
                </div>

                {{-- Confirmation --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="form-control" 
                        placeholder="********"
                        required>
                </div>

                {{-- Rôle --}}
                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="" disabled selected>-- Sélectionnez un rôle --</option>
                        <option value="employee" {{ old('role') === 'employee' ? 'selected' : '' }}>Employé</option>
                        <option value="accountant" {{ old('role') === 'accountant' ? 'selected' : '' }}>Comptable</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrateur</option>
                    </select>
                </div>

                {{-- Boutons --}}
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-success">Créer le compte</button>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Déjà un compte ? Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
