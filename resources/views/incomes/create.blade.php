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

<button><a href="{{route('incomes.create')}}">saisir une depense</a></button>
<button><a href="{{route('incomes.show')}}">recapitulatif des depenses</a> </button>

<form action="" method="post">

    <label for="date">Date :</label><br>
    <input type="date" name="date"><br>

    <label for="amount">amount:</label><br>
    <input type="decimal" name ="Amount"><br>

    <label for="recipient">recipient:</label><br>
    <input type="text" name ="recipient"><br>

    <label for="description">decription</label><br>
    <input type="text"><br><br>

    <label for="category">category:</label><br>
    <input type="text" name ="category"><br>


    <button type="submit">
      Enregistrer
   </button>
</form>
    
@endsection