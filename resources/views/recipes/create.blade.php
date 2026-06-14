@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">Add Recipe</h1>

  <form action="/recipes" method="POST" class="bg-white p-6 rounded-x1 shadow space-y-4">
    @csrf

    <input name="title" placeholder="Recipe Title" class="w-full border p-2 rounded" required>
    
    <textarea name="description" placeholder="Recipe Description" class="w-full border p-2 rounded" required></textarea>
    
    <textarea name="ingredients" placeholder="Recipe Ingredients" class="w-full border p-2 rounded" required></textarea>
    
    <textarea name="steps" placeholder="Recipe Steps" class="w-full border p-2 rounded" required></textarea>

    <button class="bg-blue-500 px-4 py-2 rounded">
      Add Recipe
    </button>
  </form>
@endsection