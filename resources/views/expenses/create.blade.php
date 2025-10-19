@extends('layout.app')

@section('content')
    <h1>LES DEPENSES</h1>
    <hr>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    {{-- <ul><li><a href="{{route('expenses.create')}}"> saisir une depense</a></li></ul>
<ul><li><a href="{{route('expenses.show')}}">recapitulatif des depenses</a></li></ul> --}}

    <button><a href="{{ route('expenses.create') }}">saisir une depense</a></button>
    <button><a href="{{ route('expenses.show') }}">recapitulatif des depenses</a> </button>

    <form action="{{route('expenses.store')}}" method="post">
      @csrf

      <label for="date">Date :</label><br>
      <input type="date" name="date"><br>

      <label for="amount">amount:</label><br>
      <input type="decimal" name ="amount"><br>

      <label for="recipient">recipient:</label><br>
      <input type="text" name ="recipient"><br>

      <label for="description">decription</label><br>
      <input type="text" name="description"><br><br>

         <div class="mb-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <select class="form-select" id="category_id" name="category_id" required>

                    {{-- <option value="">Sélectionner une catégorie</option> --}}
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


      <button type="submit">
          Enregistrer
      </button>
    </form>
@endsection
