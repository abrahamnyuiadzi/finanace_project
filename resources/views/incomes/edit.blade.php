@extends('layout.app')

@section('content')

<h1 class="page-title">Modifier un revenu</h1>
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

@if ($message = Session::get('success'))
    <p class="success-message">{{ $message }}</p>
@endif

<form action="{{ route('incomes.update', $income->id) }}" method="post" class="form-card">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="date">Date :</label>
        <input type="date" name="date" id="date" value="{{ old('date', $income->date) }}">
    </div>

    <div class="form-group">
        <label for="amount">Montant :</label>
        <input type="number" name="amount" id="amount" step="0.01" value="{{ old('amount', $income->amount) }}">
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <input type="text" name="description" id="description" value="{{ old('description', $income->description) }}">
    </div>

    <div class="form-group">
        <label for="category_id">Catégorie :</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $income->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn-primary">Modifier le revenu</button>
    <a href="{{ route('incomes.index') }}" class="btn-secondary">Retour</a>
</form>

@endsection
