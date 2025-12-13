@extends('layout.app')

@section('content')
<div class="expenses-container">
    <h1>Liste des dépenses</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="expenses-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
            <tr>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->description ?? 'Non rempli' }}</td>
                <td>{{ $expense->category->name ?? 'Non définie' }}</td>
                <td>{{ number_format($expense->amount, 0, ',', ' ') }} FCFA</td>
                <td class="actions">
                    <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-view">Détails</a>
                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-edit">Modifier</a>
                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ? Cette action sera irréversible !')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class ="btnSave"><a href="{{route('expenses.create')}}">creer une depense</a> </button>
</div>
@endsection
