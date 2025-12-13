@extends('layout.app')

@section('content')

<h1 class="page-title">Liste des revenus</h1>

@if ($message = Session::get('success'))
    <p class="success-message">{{ $message }}</p>
@endif

<div class="table-wrapper">
    <table class="styled-table">
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
            @foreach ($incomes as $income)
            <tr>
                <td>{{ $income->date }}</td>
                <td>{{ $income->description ?? 'Non rempli' }}</td>
                <td>{{ $income->category->name ?? 'Non catégorisé' }}</td>
                <td>{{ number_format($income->amount, 0, ',', ' ') }} FCFA</td>

                <td class="actions-cell">
                    <a href="{{ route('incomes.show', $income->id) }}" class="btn-action btn-view">Détails</a>

                    <a href="{{ route('incomes.edit', $income->id) }}" class="btn-action btn-edit">Modifier</a>

                    <form action="{{ route('incomes.destroy', $income->id) }}" 
                          method="post" 
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce revenu ? Cette action est irréversible !')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    
</div>

<button class ="btnSave"><a href="{{route('incomes.create')}}">Enregistrer une revenue</a></button>
@endsection
