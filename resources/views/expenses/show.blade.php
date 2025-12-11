@extends('layout.app')

@section('content')

<h1 class="page-title">Détails de la dépense</h1>

<div class="expense-details-card">
    
    <div class="detail-row">
        <span class="label">Recipient :</span>
        <span class="value">{{ $expense->recipient }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Description :</span>
        <span class="value">{{ $expense->description ? $expense->description : 'Non rempli.' }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Date :</span>
        <span class="value">{{ $expense->date }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Montant :</span>
        <span class="value">{{ number_format($expense->amount, 0, ',', ' ') }} FCFA</span>
    </div>

    <div class="detail-row">
        <span class="label">Catégorie :</span>
        <span class="value">{{ $expense->category->name ?? 'Non catégorisé' }}</span>
    </div>

</div>

<a href="{{ route('expenses.index') }}" class="btn-back">← Retour aux dépenses</a>

@endsection
