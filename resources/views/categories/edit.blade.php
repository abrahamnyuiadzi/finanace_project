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

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        
       
        <label for="category">categorie</label>
        <input type="text" name="name" value="{{ old('category', $category->category) }}">

       

        <button type="submit" class="btn-submit">
            Modifier la categorie
        </button>
    </form>

</div>

@endsection
