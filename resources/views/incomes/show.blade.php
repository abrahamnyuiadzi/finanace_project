@extends('layout.app')

@section('content')

<h1>details du revenue</h1>

<b>date :</b>{{$income->date}} <br/>
<b>Description:</b>{{$income->description ? $expense->description : 'Non rempli.'}} <br/>
@endsection