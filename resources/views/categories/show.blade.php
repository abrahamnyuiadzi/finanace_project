@extends('layout.app')

@section('content')

<h1 class="page-title">Détails de la categorie</h1>

<div class="expense-details-card">
 

    

    <div class="detail-row">
        <span class="label">Nom :</span>
        <span class="value">{{ $category->name }}</span>
    </div>

   

</div>

<a href="{{ route('categories.index') }}" class="btn-back">← Retour aux categories</a>

@endsection
