@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">Add Recipe</h1>

  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <form action="/recipes" method="POST" class="bg-white p-6 rounded-x1 shadow space-y-4">
    @include('recipes.partials.form')
  </form>
@endsection