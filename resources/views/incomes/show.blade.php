@extends('layout.app')

@section('content')

<h1 class="page-title">Détails du revenu</h1>

<div class="card-income">

    <div class="line">
        <span class="line-label">Date :</span>
        <span class="line-value">{{ $income->date }}</span>
    </div>

    <div class="line">
        <span class="line-label">Description :</span>
        <span class="line-value">{{ $income->description ?? 'Non rempli.' }}</span>
    </div>

    <div class="line">
        <span class="line-label">Catégorie :</span>
        <span class="line-value">{{ $income->category->name ?? 'Non catégorisé' }}</span>
    </div>

    <div class="line">
        <span class="line-label">Montant :</span>
        <span class="line-value">{{ number_format($income->amount, 0, ',', ' ') }} FCFA</span>
    </div>

</div>

<div class="action-group">
    <a href="{{ route('incomes.edit', $income->id) }}" class="btn-primary">Modifier</a>
    <a href="{{ route('incomes.index') }}" class="btn-secondary">Retour</a>
</div>

@endsection
