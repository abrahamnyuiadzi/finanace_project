@extends('layout.app')

@section('content')
<h1>liste des revenues</h1>

@if ($message =Session::get('success'))
<p>
    {{$message}}
</p>
@endif

  @foreach ($incomes as $income)
    <p>
    <b>Date:</b> {{$income->date}} <br/>
    <b>Description:</b>{{$income->description ? $income->description : "Non rempli"}} <br/>

    <a href="{{ route('incomes.show' ,$income->id)}}">
    Détails
    </a>

    <a href="{{ route('incomes.edit' ,$income->id)}}">
    Modifier
   </a>
    <form action="{{route('incomes.destroy', $income->id)}}" method="post" onsubmit ="return confirm('Etes vous sur  de vouloir supprimer cette depenses ? cette action sera irréversible!')">
    @csrf

    @method('DELETE')
    <button type="submit">
        Supprimer
    </button>
    </form>
    </p>

    @endforeach
    
@endsection