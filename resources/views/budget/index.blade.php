@extends('layout.app')

@section('content')
<h1>Budget par catégorie</h1>

<!-- Graphique Chart.js -->
<div style="width: 80%; margin: 20px auto;">
    <canvas id="budgetChart"></canvas>
</div>

<table border="1" cellpadding="5" style="width: 80%; margin: auto;">
    <thead>
        <tr>
            <th>Catégorie</th>
            <th>Dépenses</th>
            <th>Revenus</th>
            <th>Solde</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $cat)
            <tr>
                <td>{{ $cat['name'] }}</td>
                <td>{{ $cat['expenses'] }}</td>
                <td>{{ $cat['incomes'] }}</td>
                <td style="color: {{ $cat['balance'] < 0 ? 'red' : 'green' }};">
                    {{ $cat['balance'] }}
                </td>
            </tr>
        @endforeach
        <tr>
            <th>Total</th>
            <th>{{ $total_expenses }}</th>
            <th>{{ $total_incomes }}</th>
            <th style="color: {{ $total_balance < 0 ? 'red' : 'green' }};">{{ $total_balance }}</th>
        </tr>
    </tbody>
</table>

<!-- Export CSV / PDF -->
<div style="margin-top: 20px; text-align: center;">
    <a href="{{ route('budget.export.csv') }}" style="margin-right: 15px;">Exporter CSV</a>
    <a href="{{ route('budget.export.pdf') }}">Exporter PDF</a>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const categories = @json($categories->pluck('name'));
    const expenses = @json($categories->pluck('expenses'));
    const incomes = @json($categories->pluck('incomes'));

    const ctx = document.getElementById('budgetChart').getContext('2d');
    const budgetChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categories,
            datasets: [
                {
                    label: 'Dépenses',
                    data: expenses,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                },
                {
                    label: 'Revenus',
                    data: incomes,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: 'Budget par catégorie'
                }
            },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
