<!DOCTYPE html>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear') }}
            </h2>
 
        </x-slot>
        
        <body class="font-sans antialiased bg-gray-100">
            <div class="min-h-screen flex flex-col px-3 py-5 items-center">         
                <div class="w-full max-w-screen-md px-3 py-1 bg-white shadow-md rounded-lg">
                    <div class="p-6">

                        <div class="flex items-center mb-6">
                            <a href="javascript:history.back()" class="mr-4">
                                <svg class="w-6 h-6 text-gray-800 hover:text-gray-600 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <h2 class="text-2xl font-semibold text-gray-800">Agregando contactos a la empresa "{{ $empresa->nombre }}"</h2>
                        </div>
                        
                        <form action="{{ route('contactos.store', ['empresa_id' => $empresa->id]) }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
                            @csrf
                            <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                            <div class="mb-6">
                                <!-- Este div ya no parece parte del formulario -->
                                <!-- Solo indica la empresa a la que se están agregando contactos -->
                                <!-- Centrado horizontalmente -->
                                <div class="text-center mb-4">
                                    <p class="text-gray-700 font-medium">{{ $empresa->nombre }}</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                            </div>
                            <div class="mb-6">
                                <label for="celular" class="block text-gray-700 font-medium mb-2">Celular:</label>
                                <input type="text" id="celular" name="celular" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="+50377889900" required>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500 " placeholder="tucorreo@sitio.com" required>
                            </div>
                            <div class="mb-6">
                                <label for="email_2" class="block text-gray-700 font-medium mb-2">Email 2:</label>
                                <input type="email" id="email_2" name="email_2" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500"  placeholder="Opcional">
                            </div>
                            <!-- Otros campos del formulario -->
                            <button type="submit" class="w-full btn btn-blue text-black font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                                Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </body>
        
        
    
</x-app-layout>   

