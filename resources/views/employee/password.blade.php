@extends('layout.app')

@section('content')

<h1 class="dashboard-title">Changer le mot de passe</h1>

<div class="table-wrapper" style="max-width:600px; margin:auto;">

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

    <form method="POST" action="{{ route('employee.password.update') }}">
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

        <div class="form-actions">
            <button type="submit" class="btn-action btn-primary">
                Mettre à jour
            </button>

            <a href="{{ route('employee.dashboard') }}" class="btn-action btn-secondary">
                Annuler
            </a>
        </div>
    </form>

</div>

@endsection
