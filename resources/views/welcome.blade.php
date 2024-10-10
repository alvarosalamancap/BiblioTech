<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Inicio - Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#618985] flex items-center justify-center h-screen">
    <div class="text-center">
        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/bibliotech-logo1.png') }}" alt="Bibliotech Logo" class="mx-auto w-40 h-40">
        </div>

        <!-- Título -->
        <h1 class="text-white text-4xl font-bold mb-6">Bienvenido a Bibliotech</h1>

        <!-- Botones -->
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="bg-white text-[#618985] px-6 py-3 rounded-full shadow-lg hover:bg-gray-200 transition duration-300 font-semibold">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="bg-white text-[#618985] px-6 py-3 rounded-full shadow-lg hover:bg-gray-200 transition duration-300 font-semibold">Regístrate</a>
        </div>
    </div>
</body>
</html>
