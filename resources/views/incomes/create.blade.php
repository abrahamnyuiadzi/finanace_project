@extends('layout.app')

@section('content')

<h1>LES DEPENSES</h1><hr>


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

</div>
@endif

{{-- <ul><li><a href="{{route('expenses.create')}}"> saisir une depense</a></li></ul>
<ul><li><a href="{{route('expenses.show')}}">recapitulatif des depenses</a></li></ul> --}}

<button><a href="{{route('incomes.create')}}">saisir une Revenue</a></button>
<button><a href="{{route('incomes.show')}}">recapitulatif des revenues</a> </button>

<form action="{{ route('incomes.store') }}" method="post">

    <label for="date">Date :</label><br>
    <input type="date" name="date"><br>

    <label for="amount">amount:</label><br>
    <input type="decimal" name ="Amount"><br>


    <label for="description">decription</label><br>
    <input type="text"><br><br>

     <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" id="category_id" name="category_id"   required>

                {{-- <option value="">Sélectionner une catégorie</option> --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


    <button type="submit">
      Enregistrer
   </button>
</form>
    
@endsection