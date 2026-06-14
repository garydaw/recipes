<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipes</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-grey-100 min-h-screen">

  <!-- Navigation Bar -->
  <nav class="bg=white shadow-md mb-8">
    <div class="max-w-5xl mx-auto px-4 flex justify-between">
      <a href="/recipes" class="text-xl font-bold text-blue-600">
        Recipes
      </a>

      @auth
        <a href="/recipes/create" class="text-xl font-bold text-blue-600">
          Add Recipe
        </a>
        <div class="flex items-center gap-4">
            <span class="text-gray-600 text-sm">
                Hi {{ auth()->user()->name }}!
            </span>

            <form method="POST" action="/logout">
                @csrf
                <button class="text-red-500">Logout</button>
            </form>
        </div>
      @endauth

      @guest
        <div class="flex gap-4">
            <a href="/login" class="text-blue-500">Login</a>
            <a href="/register" class="text-blue-500">Register</a>
        </div>
      @endguest
    </div>
  </nav>

  <!--- Content -->
  <main class="max-w-5xl mx-auto px-4">

    @if (session('success'))
      <div class="max-w-5xl mx-auto px-4 mb-4">
          <div class="relative bg-green-100 text-green-800 p-4 rounded shadow">
              <button type="button" onclick="this.closest('.relative').style.display='none'" class="absolute top-2 right-2 text-green-800 hover:text-green-900 font-bold">
                &times;
              </button>
              {{ session('success') }}
          </div>
      </div>
    @endif

    @yield('content')
  </main>

</body>
</html>