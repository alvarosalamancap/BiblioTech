<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña - Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#618985] flex items-center justify-center h-screen">
    <div class="bg-[#96bbbb] shadow-lg rounded-lg p-8 w-96">
        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="Bibliotech Logo" class="w-24 h-24">
        </div>

        <!-- Formulario de Cambiar Contraseña -->
        <h2 class="text-2xl font-bold text-center mb-6">Cambiar Contraseña</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" onsubmit="return validateForm()">
            @csrf <!-- Protege el formulario con CSRF token -->
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="tuemail@ejemplo.com" required>
            </div>
            
            <div class="mb-4">
                <label for="current-password" class="block text-gray-700">Contraseña Actual</label>
                <input type="password" name="current_password" id="current-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="********" required>
            </div>
            
            <div class="mb-4">
                <label for="new-password" class="block text-gray-700">Nueva Contraseña</label>
                <input type="password" name="new_password" id="new-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="********" required>
            </div>
            
            <div class="mb-6">
                <label for="confirm-password" class="block text-gray-700">Confirmar Nueva Contraseña</label>
                <input type="password" name="new_password_confirmation" id="confirm-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="********" required>
            </div>

            <!-- Mensaje de error -->
            @if ($errors->any())
                <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div id="error-message" class="hidden bg-red-500 text-white px-4 py-2 rounded-md mb-4">
                Debe ingresar una contraseña válida.
            </div>

            <!-- Botón de Cambiar Contraseña -->
            <div class="flex justify-center">
                <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">Cambiar Contraseña</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            const newPassword = document.getElementById("new-password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const errorMessage = document.getElementById("error-message");

            // Validación de seguridad de la contraseña
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
            if (!passwordRegex.test(newPassword)) {
                errorMessage.innerText = "La nueva contraseña no cumple los estándares de seguridad.";
                errorMessage.classList.remove("hidden");
                return false;
            }

            // Confirmación de la nueva contraseña
            if (newPassword !== confirmPassword) {
                errorMessage.innerText = "Las contraseñas no coinciden.";
                errorMessage.classList.remove("hidden");
                return false;
            }

            errorMessage.classList.add("hidden");
            return true;
        }
    </script>
</body>
</html>
