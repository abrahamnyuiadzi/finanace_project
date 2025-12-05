
@extends('layout.app')

@section('content')
    

<h1>Tableau de Budget</h1>

<table border="1" cellpadding="20">
    <thead>
        <tr>
            <th>Catégorie</th>
            <th>Total Dépenses</th>
            <th>Total Incomes</th>
            <th>Solde</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category['name'] }}</td>
                <td>{{ number_format($category['expenses'], 0, ',', ' ') }}</td>
                <td>{{ number_format($category['incomes'], 0, ',', ' ') }}</td>
                <td 
                    style="color: {{ $category['balance'] >= 0 ? 'green' : 'red' }};">
                    {{ number_format($category['balance'], 0, ',', ' ') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    
@endsection