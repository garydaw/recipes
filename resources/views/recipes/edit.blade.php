@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">Edit Recipe</h1>

  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  
  <div  class="bg-white p-6 rounded-x1 shadow space-y-4">
    <form action="/recipes/{{ $recipe->id }}" method="POST">
      @csrf
      @method('PUT')

      @include('recipes.partials.form')
    </form>

    <form method="POST" action="/recipes/{{ $recipe->id }}">
      @csrf
      @method('DELETE')

      <button onclick="return confirm('Are you sure you want to delete this recipe?')"
        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
          Delete Recipe
      </button>
    </form>
  </div>
@endsection