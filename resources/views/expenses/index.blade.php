@extends('layout.app')

@section('content')
<h1>liste des depenses</h1>

@if ($message =Session::get('success'))
<p>
    {{$message}}
</p>
@endif

  @foreach ($expenses as $expense)
    <p>
    <b>Name:</b> {{$expense->recipient}} <br/>
    <b>Description:</b>{{$expense->description ? $expense->description : "Non rempli"}} <br/>

    <a href="{{ route('expenses.show' ,$expense->id)}}">
    Détails
  </a>

    <a href="{{ route('expenses.edit' ,$expense->id)}}">
    Modifier
</a>
    <form action="{{route('expenses.destroy', $expense->id)}}" method="post" onsubmit ="return confirm('Etes vous sur  de vouloir supprimer cette depenses ? cette action sera irréversible!')">
    @csrf

    @method('DELETE')
    <button type="submit">
        Supprimer
    </button>
    </form>
    </p>

    @endforeach
    
@endsection