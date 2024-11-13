<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#618985] flex items-center justify-center h-screen">
    <div class="bg-[#96bbbb] shadow-lg rounded-lg p-8 w-96 text-center">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="Bibliotech Logo" class="w-24 h-24">
        </div>

        <!-- Título -->
        <h1 class="text-white text-4xl font-bold mb-6">Bienvenido a Bibliotech</h1>

        <!-- Botones -->
        <div class="space-y-4">
            <a href="{{ route('login') }}" class="bg-white text-[#618985] px-6 py-3 rounded-full shadow-lg hover:bg-gray-200 transition duration-300 font-semibold w-full block text-center">
                Iniciar Sesión
            </a>
            <a href="{{ route('register') }}" class="bg-white text-[#618985] px-6 py-3 rounded-full shadow-lg hover:bg-gray-200 transition duration-300 font-semibold w-full block text-center">
                Regístrate
            </a>
        </div>
    </div>
</body>
</html>
