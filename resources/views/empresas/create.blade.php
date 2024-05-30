<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear') }}
        </h2>
    </x-slot>
    
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex flex-col px-3 py-6 items-center">         
            <div class="w-full max-w-screen-md px-3 py-1 bg-white shadow-md rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <a href="{{ route('empresas.index')}}" class="mr-4">
                            <svg class="w-6 h-6 text-gray-800 hover:text-gray-600 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        <h2 class="text-2xl font-semibold text-gray-800">Registrar Empresa</h2>
                    </div>
                    
                    <form action="{{ route('empresas.store') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
                        @csrf
                    
                        <div class="mb-6">
                            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                        </div>
                    
                        <div class="mb-6">
                            <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                        </div>
                    
                        <div class="mb-6">
                            <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                        </div>
                    
                        <div class="mb-6">
                            <label for="sitio_web" class="block text-gray-700 font-medium mb-2">Sitio Web:</label>
                            <input type="url" id="sitio_web" name="sitio_web" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500">
                        </div>
                    
                        <div class="mt-6">
                            <button type="submit" class="w-full btn btn-blue text-black font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                                Registrar
                            </button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>       
    </body>
</x-app-layout>
