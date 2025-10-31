@extends('layout.app')

@section('content')

<h1>details de la depense</h1>

<b>recipient :</b>{{$expense->recipient}} <br/>
<b>Description:</b>{{$expense->description ? $expense->description : 'Non rempli.'}} <br/>
@endsection