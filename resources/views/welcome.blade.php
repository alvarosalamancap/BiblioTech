<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio - Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#618985] flex items-center justify-center h-screen">
    <div class="text-center space-y-8">
        <!-- Logo -->
        <div>
            <img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="Bibliotech Logo" class="mx-auto w-40 h-40">
        </div>

        <!-- Título -->
        <h1 class="text-white text-4xl font-bold">Bienvenido a Bibliotech</h1>

        <!-- Botón Adelante -->
        <div class="mt-10"> <!-- Ajuste de margen superior -->
            <a href="{{ route('login') }}" class="bg-white text-[#618985] px-6 py-3 rounded-full shadow-lg hover:bg-gray-200 transition duration-300 font-semibold">Adelante</a>
        </div>
    </div>
</body>
</html>

