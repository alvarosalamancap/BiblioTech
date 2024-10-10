<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #618985;
        }
        .box {
            background-color: #96BBBB;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn {
            width: 100%;
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
            border-radius: 0;
            transition: background-color 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="max-w-sm mx-auto mt-10">
        <!-- Cuadro para el formulario completo -->
        <div class="box">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="Bibliotech Logo" class="w-24 h-24">
            </div>

            <!-- Título -->
            <h2 class="text-3xl font-semibold text-center mb-6">Regístrate</h2>

            <!-- Mensajes de éxito -->
            @if (session('success'))
                <div class="mb-5">
                    <ul class="bg-green-500 text-white p-3 rounded">
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif

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

            <!-- Formulario -->
            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <!-- Campo RUT -->
                <div class="mb-5">
                    <label for="rut" class="block mb-2 text-sm font-medium text-gray-900">RUT:</label>
                    <input type="text" id="rut" name="rut" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese su RUT" />
                </div>

                <!-- Campo Nombre -->
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese su nombre"/>
                </div>

                <!-- Campo Apellido -->
                <div class="mb-5">
                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Apellidos:</label>
                    <input type="text" id="lastname" name="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese sus apellidos"/>
                </div>

                <!-- Campo Correo Electrónico -->
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese su correo"/>
                </div>

                <!-- Campo Teléfono -->
                <div class="mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Teléfono:</label>
                    <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese un número Telefónico (+56)"/>
                </div>

                <!-- Botones -->
                <div class="flex flex-col space-y-3">
                    <button type="submit" class="btn text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300">Registrar</button>

                    <!-- Botón de Volver -->
                    <a href="{{ route('login') }}" class="btn text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300">Volver</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
