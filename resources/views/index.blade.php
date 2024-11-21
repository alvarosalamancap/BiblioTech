<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio - Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#618985] flex items-center justify-center h-screen relative">
    <!-- Botón de Cambiar Contraseña -->
<<<<<<< HEAD
    <a href="{{ route('changePassword') }}" class="absolute top-4 right-4 bg-[#96bbbb] text-white px-6 py-2 rounded-full shadow-lg hover:bg-[#7ea6a6] transition duration-300">
        Cambiar Contraseña
    </a>
=======
    <a href="{{ route('password.change') }}" class="btn btn-primary">Cambiar Contraseña</a>
>>>>>>> b3c8785db30d59d73f32dc8d9d374f172ed7354e

    <div class="text-center">
        <!-- Logo -->
        <div class="mb-8">
            <img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="Bibliotech Logo" class="mx-auto w-40 h-40">
        </div>
    </div>
</body>
</html>
