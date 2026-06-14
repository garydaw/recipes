@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">All Recipes</h1>

  <div class="grid grod-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach ($recipes as $recipe)
      <a href="/recipes/{{ $recipe->id }}" class="block bg-white rounded-x1 shadow hover:shadow-lg transistion p-4">

        <h2 class="text-xl font-semibold text-blue-600 mb-2">
          {{ $recipe->title }}
        </h2>

        <p class="text-gray-600 text-sm">
          {{ Str::limit($recipe->description, 100) }}
        </p>
      </a>
    @endforeach
  </div>
@endsection