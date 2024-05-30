<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Contacto') }}
        </h2>
    </x-slot>

    <body>
        <div class="flex flex-col px-3 py-5 items-center">
            <div class="w-full max-w-screen-md px-3 py-1 bg-white shadow-md rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <a href="javascript:history.back()" class="mr-4">
                                <svg class="w-6 h-6 text-gray-800 hover:text-gray-600 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <h2 class="text-2xl font-semibold text-gray-800">Editar Contacto</h2>
                        </div>
                    </div>
                    
                    <form action="{{ route('contactos.update', ['empresa_id' => $empresa->id, 'id' => $contacto->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="{{ $contacto->nombre }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        
                        <div class="mb-6">
                            <label for="celular" class="block text-gray-700 font-medium mb-2">Celular:</label>
                            <input type="text" id="celular" name="celular" value="{{ $contacto->celular }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $contacto->email }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        
                        <div class="mb-6">
                            <label for="email_2" class="block text-gray-700 font-medium mb-2">Email 2:</label>
                            <input type="email" id="email_2" name="email_2" value="{{ $contacto->email_2 }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-black font-semibold py-2 px-4 border border-blue-500 rounded shadow">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
