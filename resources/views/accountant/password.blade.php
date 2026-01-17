@extends('layout.app')

@section('content')

<style>
    /* Conteneur plein écran */
    .password-page {
        min-height: calc(100vh - 80px); /* ajuste si tu as une navbar */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Carte du formulaire */
    .password-card {
        width: 100%;
        max-width: 420px;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .password-card h1 {
        text-align: center;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .form-group input {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
    }

    .form-group input:focus {
        border-color: #2563eb;
    }

    .btn-primary {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: none;
        background-color: #2563eb;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #1e40af;
    }

    .error-message {
        background: #fee2e2;
        color: #991b1b;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    .success-message {
        background: #dcfce7;
        color: #166534;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 15px;
    }
</style>

<div class="password-page">

    <div class="password-card">

        <h1>Changer le mot de passe</h1>

        {{-- Erreurs --}}
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Succès --}}
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('accountant.password.update') }}">
            @csrf

            <div class="form-group">
                <label>Mot de passe actuel</label>
                <input type="password" name="current_password" required>
            </div>

            <div class="form-group">
                <label>Nouveau mot de passe</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Confirmer le nouveau mot de passe</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-primary">
                Mettre à jour
            </button>
        </form>

    </div>

</div>

@endsection
