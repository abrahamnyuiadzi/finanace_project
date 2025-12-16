@extends('layout.app')

@section('content')

<h1 class="dashboard-title">Dashboard Comptable</h1>

<div class="dashboard-cards">

    <div class="dashboard-card">
        <h3>Total des Revenus Validés</h3>
        <p>{{ number_format($total_incomes) }} FCFA</p>
    </div>

    <div class="dashboard-card">
        <h3>Total des Dépenses Validées</h3>
        <p>{{ number_format($total_expenses) }} FCFA</p>
    </div>

    <div class="dashboard-card">
        <h3>Solde Actuel</h3>
        <p style="color:{{ $balance < 0 ? 'red' : 'green' }};">
            {{ number_format($balance) }} FCFA
        </p>
    </div>

</div>

<div class="dashboard-info" style="margin-top: 30px;">
    <p>
        Les montants affichés correspondent uniquement aux
        <strong>revenus et dépenses validés par l’administrateur</strong>.
    </p>
</div>
<div class="dashboard-action-card">
    <a href="{{ route('accountant.password.edit') }}">
        Changer mon mot de passe
    </a>
</div>


@endsection
