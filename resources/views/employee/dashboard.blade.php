@extends('layout.app')

@section('content')

<h1 class="dashboard-title">Mon Espace Employé</h1>

<div class="dashboard-cards">

    <div class="dashboard-card">
        <h3>Nom</h3>
        <p>{{ $user->name }}</p>
    </div>

    <div class="dashboard-card">
        <h3>Email</h3>
        <p>{{ $user->email }}</p>
    </div>

    <div class="dashboard-card">
        <h3>Rôle</h3>
        <p>{{ ucfirst($user->role) }}</p>
    </div>

    <div class="dashboard-card">
        <h3>Compte créé le</h3>
        <p>{{ $user->created_at->format('d/m/Y') }}</p>
    </div>

</div>

<div class="dashboard-cards">
{{-- 
    <div class="dashboard-action-card">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-action btn-secondary">
                Se déconnecter
            </button>
        </form>
    </div> --}}

    <div class="dashboard-action-card">
    <a href="{{ route('employee.password.edit') }}">
        Changer mon mot de passe
    </a>
</div>


</div>

@endsection
