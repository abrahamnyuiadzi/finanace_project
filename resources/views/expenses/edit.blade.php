@extends('layout.app')

@section('content')

<h1 class="page-title">Modifier une dépense</h1>

@if ($errors->any())
<div class="alert alert-danger form-alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success'))
<p class="success-message">
    {{ $message }}
</p>
@endif

<div class="expense-form-card">

    <form action="{{ route('expenses.update', $expense->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="date">Date</label>
        <input type="date" name="date" value="{{ old('date', $expense->date) }}">

        <label for="amount">Montant</label>
        <input type="number" step="0.01" name="amount" value="{{ old('amount', $expense->amount) }}">

        <label for="recipient">Destinataire</label>
        <input type="text" name="recipient" value="{{ old('recipient', $expense->recipient) }}">

        <label for="description">Description</label>
        <input type="text" name="description" value="{{ old('description', $expense->description) }}">

        <label for="category_id">Catégorie</label>
        <select id="category_id" name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ old('category_id', $expense->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn-submit">
            Modifier la dépense
        </button>
    </form>

</div>

@endsection
