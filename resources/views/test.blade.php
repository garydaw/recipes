<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tailwind Test</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-blue-600">
            Tailwind is working 🎉
        </h1>

        <p class="mt-4 text-gray-600">
            If this looks styled, you're good.
        </p>

        <div class="mt-6 bg-green-100 text-green-700 p-3 rounded">
            Success block
        </div>
    </div>

</body>
</html>