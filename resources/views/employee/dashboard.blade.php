@extends('layout.app')

@section('title', 'Dashboard Employé')

@section('content')

<h1>Bienvenue, {{ auth()->user()->name }}</h1>

<p>Vous pouvez consulter vos informations financières.</p>

@endsection
