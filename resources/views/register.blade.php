<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #96BBBB;
        }
    </style>
</head>
<body>
    <form class="max-w-sm mx-auto mt-10" method="POST" action="{{ route('register') }}" novalidate>
        @csrf
        <div class="mb-7 flex items-center justify-center">
            <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">Registro</span>
        </div>

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="mb-5">
                <ul class="bg-red-500 text-white p-3 rounded">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Campo RUT -->
        <div class="mb-5">
            <label for="rut" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RUT:</label>
            <input type="text" id="rut" name="rut" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="0000000-0" />
        </div>

        <!-- Campo Nombre -->
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>

        <!-- Campo Apellido -->
        <div class="mb-5">
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos:</label>
            <input type="text" id="lastname" name="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>

        <!-- Campo Correo Electrónico -->
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico:</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>

        <!-- Botón de Enviar -->
        <div class="flex justify-center mb-5">
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-none text-sm px-5 py-2.5 text-center dark:bg-blue-700 dark:hover:bg-blue-600 dark:focus:ring-blue-900">Registrar</button>
        </div>
    </form>
</body>
</html>
