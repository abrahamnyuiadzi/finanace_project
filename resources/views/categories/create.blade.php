@extends('layout.app')

@section('content')

<h1>categories</h1>

 @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

 
   

     <form action="{{route('categories.store')}}" method="post">
      @csrf

      <label for="category">category :</label><br>
      <input type="text" name="category"><br>
            <button type="submit">
          Enregistrer
      </button>
    </form>

    
@endsection