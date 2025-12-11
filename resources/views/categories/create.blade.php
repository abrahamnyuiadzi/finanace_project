@extends('layout.app')

@section('content')

<h1 class="category-title">Ajouter une catégorie</h1>
<hr>

@if ($errors->any())
    <div class="category-alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.store') }}" method="post" class="category-form">
    @csrf

    <div class="category-group">
        <label for="name">Nom de la catégorie :</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>

    <button type="submit" class="category-btn-submit">Enregistrer</button>
    <a href="{{ route('categories.index') }}" class="category-btn-back">Retour</a>
</form>

@endsection
