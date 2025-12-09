@extends('layout.app')

@section('title', 'Dashboard Comptable')

@section('content')

<h1>Dashboard Accountant</h1>

<div class="cards">

    <div class="card">
        <h3>Total Revenus</h3>
        <p>{{ $total_incomes }}</p>
    </div>

    <div class="card">
        <h3>Total Dépenses</h3>
        <p>{{ $total_expenses }}</p>
    </div>

</div>

@endsection
