@extends('layout.app')

@section('content')

<h1 class="dashboard-title">Admin Dashboard</h1>

<div class="dashboard-cards">

    <div class="dashboard-card">
        <h3>Total Incomes</h3>
        <p>{{ number_format($total_incomes) }} FCFA</p>
    </div>

    <div class="dashboard-card">
        <h3>Total Expenses</h3>
        <p>{{ number_format($total_expenses) }} FCFA</p>
    </div>

    <div class="dashboard-card">
        <h3>Balance</h3>
        <p style="color:{{ $balance < 0 ? 'red' : 'green' }};">
            {{ number_format($balance) }} FCFA
        </p>
    </div>

    <div class="dashboard-action-card">
        <a href="{{ route('admin.users.create') }}">Enregistrer un Employé</a>
    </div>

</div>

<div class="dashboard-chart">
    <h2>Incomes vs Expenses (Monthly)</h2>
    <canvas id="dashboardChart"></canvas>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('dashboardChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [
                {
                    label: 'Incomes',
                    data: @json($monthly_incomes),
                    borderColor: '#4a69bd',
                    backgroundColor: 'rgba(74,105,189,0.2)',
                    borderWidth: 2,
                    fill: true
                },
                {
                    label: 'Expenses',
                    data: @json($monthly_expenses),
                    borderColor: '#eb2f06',
                    backgroundColor: 'rgba(235,47,6,0.2)',
                    borderWidth: 2,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        }
    });
});
</script>
@endsection
