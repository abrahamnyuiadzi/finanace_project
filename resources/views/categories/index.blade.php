@extends('layout.app')

@section('content')
<div class="expenses-container">
    <h1>Liste des dépenses</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="expenses-table">
        <thead>
            <tr>
              
                <th>Catégorie</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                
                <td class="actions">
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-view">Détails</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">Modifier</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ? Cette action sera irréversible !')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class ="btnSave"><a href="{{route('categories.create')}}">creer une categorie </a> </button>
</div>
@endsection
