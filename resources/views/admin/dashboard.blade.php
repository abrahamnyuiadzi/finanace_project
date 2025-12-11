@extends('layout.app')

@section('content')

<h1 class="page-title">Admin Dashboard</h1>

<div class="dashboard-cards">

    <div class="card">
        <h3>Total Incomes</h3>
        <p>{{ number_format($total_incomes) }} FCFA</p>
    </div>

    <div class="card">
        <h3>Total Expenses</h3>
        <p>{{ number_format($total_expenses) }} FCFA</p>
    </div>

    <div class="card">
        <h3>Balance</h3>
        <p style="color:{{ $balance < 0 ? 'red' : 'green' }};">
            {{ number_format($balance) }} FCFA
        </p>
    </div>

</div>
 <div class="card"> <a href="{{ route('admin.users.create') }}">Enregistrer un Employé</a></div>
    

<br><br>

<h2>Incomes vs Expenses (Monthly)</h2>
<canvas id="chart1"></canvas>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('chart1').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [
                {
                    label: 'Incomes',
                    data: @json($monthly_incomes),
                    borderWidth: 2
                },
                {
                    label: 'Expenses',
                    data: @json($monthly_expenses),
                    borderWidth: 2
                }
            ]
        }
    });
</script>
@endsection
