@extends('layout.app')

@section('content')
    <h1>Modifier une depenses </h1>

    @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

</div>
@endif


@if ($message =Session::get('success'))
<p>
    {{$message}}
</p>
@endif


    <form action="{{ route('expenses.update', $expense->id) }}" method="post">
        @csrf
           
        @method('PUT')
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
            Modifier la depense
        </button>
    </form>


@endsection