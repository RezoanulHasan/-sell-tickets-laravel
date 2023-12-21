<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiki Online Ticketing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="font-sans">
    <header class="bg-blue-500 text-white text-center py-4">
        <h1 class="text-2xl font-semibold">Tiki Online Ticketing</h1>
    </header>

    @yield('content')
    <a href="{{ route('trips.index') }}">All Trips</a>
</body>
</html>
