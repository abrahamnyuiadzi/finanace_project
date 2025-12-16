@extends('layout.app')

@section('content')

<div class="auth-container">

    <div class="auth-card">

        <h1 class="dashboard-title" style="text-align:center;">
            Changer le mot de passe
        </h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('accountant.password.update') }}"
              class="styled-form">

            @csrf

            <div class="form-group">
                <label>Mot de passe actuel</label>
                <input type="password"
                       name="current_password"
                       required>
            </div>

            <div class="form-group">
                <label>Nouveau mot de passe</label>
                <input type="password"
                       name="password"
                       required>
            </div>

            <div class="form-group">
                <label>Confirmer le nouveau mot de passe</label>
                <input type="password"
                       name="password_confirmation"
                       required>
            </div>

            <button type="submit" class="btn-primary" style="width:100%;">
                Mettre à jour
            </button>

        </form>

    </div>

</div>

@endsection
