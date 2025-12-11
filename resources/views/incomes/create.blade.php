@extends('layout.app')

@section('content')

<h1 class="page-title">Ajouter un revenu</h1>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('incomes.store') }}" method="post" class="form-card">
    @csrf

    <div class="form-group">
        <label for="date">Date :</label>
        <input type="date" name="date" id="date" value="{{ old('date') }}">
    </div>

    <div class="form-group">
        <label for="amount">Montant :</label>
        <input type="number" name="amount" id="amount" step="0.01" value="{{ old('amount') }}">
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
    </div>

    <div class="form-group">
        <label for="category_id">Catégorie :</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn-primary">Enregistrer</button>
    <a href="{{ route('incomes.index') }}" class="btn-secondary">Retour</a>
</form>

@endsection
