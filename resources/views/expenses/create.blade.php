@extends('layout.app')

@section('content')
<div class="expense-form-container">
    <h1>Créer une dépense</h1>

    {{-- Erreurs --}}
    @if ($errors->any())
        <div class="expense-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Boutons d’actions --}}
    <div class="expense-buttons">
        <a class="btn-expense" href="{{ route('expenses.create') }}">Saisir une dépense</a>
        <a class="btn-expense" href="{{ route('expenses.index') }}">Recaptilatif des depenses</a>
    </div>

    <form action="{{ route('expenses.store') }}" method="post" class="expense-form">
        @csrf

        <label for="date">Date</label>
        <input type="date" name="date" required>

        <label for="amount">Montant</label>
        <input type="number" step="0.01" name="amount" required>

        <label for="recipient">Bénéficiaire</label>
        <input type="text" name="recipient" required>

        <label for="description">Description</label>
        <input type="text" name="description">

        <label for="category_id">Catégorie</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn-submit-expense">Enregistrer</button>

    </form>
</div>
@endsection
