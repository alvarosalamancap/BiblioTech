<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #96BBBB;
        }
        /* Estilo del botón "Registrar" */
        .register-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <!-- Botón "Registrar" en la esquina superior derecha -->
    <div class="register-btn">
        <a href="{{ route('register') }}" class="text-white bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-4 py-2 dark:bg-green-700 dark:hover:bg-green-600 dark:focus:ring-green-900">Registrar</a>
    </div>

    <form class="max-w-sm mx-auto" method="POST" action="{{ route('login') }}" novalidate>
        @csrf
        <!-- Imagen de logo -->
        <div class="mb-7 flex items-center justify-center">
            <a href="{{ route('login') }}" class="flex items-center justify-center">
              <a href="https://ibb.co/q0SVKMQ"><img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="bibliotech-logo1" border="0"></a>
            </a>
        </div>
        <!-- Título de la página -->
        <div class="mb-7 flex items-center justify-center">
            <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">Iniciar Sesión</span>
        </div>
        <!-- Campo de correo electrónico -->
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo electrónico</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre@dominio.com" required />
            @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
            @enderror
        </div>
        <!-- Campo de contraseña -->
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
            <input type="password" placeholder="••••••••" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
            @enderror
        </div>
        <!-- Botón de enviar -->
        <div class="flex justify-center mb-5">
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-none text-sm px-5 py-2.5 text-center dark:bg-blue-700 dark:hover:bg-blue-600 dark:focus:ring-blue-900">Acceder</button>
        </div>
        <!-- Mensaje de sesión -->
        @if(session('error'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ session('error') }}</p>
        @endif
    </form>
</body>
</html>