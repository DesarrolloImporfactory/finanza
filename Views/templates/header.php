<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financiero</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 h-screen bg-[#191731] p-4 absolute md:relative hidden md:block">
            <h1 class="text-white text-xl font-bold mb-4">FINANSUIT</h1>
            <ul>
                <li><a href="#inicio" class="block text-white py-2 px-4 rounded hover:bg-gray-700">Inicio</a></li>
                <li class="relative">
                    <button class="block w-full text-left text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none" onclick="toggleDropdown()">Financiero</button>
                    <ul id="dropdown" class="hidden bg-gray-800 rounded">
                        <li><a href="#tiendas" class="block text-white py-2 px-4 hover:bg-gray-600">Tiendas</a></li>
                        <li><a href="#general" class="block text-white py-2 px-4 hover:bg-gray-600">General</a></li>
                    </ul>
                </li>
                <li><a href="#contacto" class="block text-white py-2 px-4 rounded hover:bg-gray-700">Contacto</a></li>
            </ul>
        </div>
        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Your content here -->