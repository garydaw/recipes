@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-x1 shadow">

  <h1 class="text-3xl font-bold mb-4">
    {{ $recipe->title }}
  </h1>

  <p class="text-gray-600 mb-6">
    {{ $recipe->description }}
  </p>

  <h2 class="text-xl font-semibold mb-2">Ingredients</h2>
  <p class="mb-6 whitespace-pre-line">
    {{ $recipe->ingredients }}
  </p>

  <h2 class="text-xl font-semibold mb-2">Steps</h2>
  <p class="whitespace-pre-line">
    {{ $recipe->steps }}
  </p>

  @if (auth()->user() && (auth()->id() === $recipe->user_id || auth()->user()->isAdmin()))
    <a href="/recipes/{{ $recipe->id }}/edit" class="text-xl font-bold text-blue-600">
      Edit Recipe
    </a>
  @endif
</div>
@endsection