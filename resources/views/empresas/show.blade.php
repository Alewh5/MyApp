<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear') }}
        </h2>
    </x-slot>
    
    <body>
        <div class="flex flex-col px-3 py-5 items-center">         
            <div class="w-full max-w-screen-md px-3 py-1 bg-white shadow-md rounded-lg">
                <div class="p-6">
                    
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center"> <!-- Contenedor para "Atrás" y "Detalles de la empresa" -->
                            <a href="{{ route('empresas.index')}}" class="mr-4">
                                <svg class="w-6 h-6 text-gray-800 hover:text-gray-600 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <h2 class="text-2xl font-semibold text-gray-800">Detalles de la empresa</h2>
                        </div>
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-blue text-black font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                            Editar
                        </a>
                    </div>
                    
                    <div class="mb-6">
                        <p class="block text-gray-700 font-medium mb-2">Nombre:</p>
                        <p>{{ $empresa->nombre }}</p>
                    </div>
                    
                    <div class="mb-6">
                        <p class="block text-gray-700 font-medium mb-2">Dirección:</p>
                        <p>{{ $empresa->direccion }}</p>
                    </div>
                    
                    <div class="mb-6">
                        <p class="block text-gray-700 font-medium mb-2">Teléfono:</p>
                        <p>{{ $empresa->telefono }}</p>
                    </div>
                    
                    <div class="mb-6">
                        <p class="block text-gray-700 font-medium mb-2">Sitio Web:</p>
                        <p>{{ $empresa->sitio_web }}</p>
                    </div>
                </div>

                <div class="min-h-screen flex flex-col px-3 py-1 items-center">         
                    <div class="w-full max-w-screen-md bg-gray-100 shadow-md rounded-lg">
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Datos de contacto</h2>
                            <div class="mt-6">
                                @if ($empresa->contactos->isEmpty())
                                    <div class="text-center content-center text-gray-600 flex items-center justify-center h-full">NO hay informacion de contacto.</div>
                                    <div class="flex items-center justify-center h-full">
                                        <a href="{{ route('contactos.create', ['empresa_id' => $empresa->id]) }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                            REGISTRAR contacto
                                        </a>
                                    </div>
                                @else
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-gray-700">Contactos</h3>
                                    </div>
                                    @foreach($empresa->contactos as $contacto)
                                        <div class="mt-2">
                                            <p class="text-gray-600">Nombre: {{ $contacto->nombre }}</p>
                                            <p class="text-gray-600">Celular: {{ $contacto->celular }}</p>
                                            <p class="text-gray-600">Email: {{ $contacto->email }}</p>
                                            <p class="text-gray-600">Email 2: {{ $contacto->email_2 ?? 'N/A' }}</p>
                                            <div class="flex justify-end">
                                                <a href="{{ route('contactos.edit', ['empresa_id' => $empresa->id, 'id' => $contacto->id]) }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                                    Editar datos de contacto
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>                                
                        </div>
                    </div>
                    
                    <!-- Botón para mostrar el modal de confirmación -->
                    <button id="deleteButton" class="bg-red-500 hover:bg-red-600 text-black hover:text-white font-semibold py-2 px-4 border border-red-500 rounded shadow float-right">Eliminar</button>
                    
                    <!-- Modal de confirmación -->
                    <div id="confirmationModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
                        <div class="flex items-center justify-center min-h-screen">
                            <div class="relative bg-white w-1/3 p-4 rounded shadow-lg">
                                <div class="modal-content">
                                    <!-- Contenido del modal de confirmación -->
                                    <h3 class="text-lg font-semibold mb-4">¿Estás seguro de que deseas eliminar?</h3>
                                    <div class="flex justify-end">
                                        <button id="cancelButton" class="bg-gray-300 hover:bg-gray-400 text-black font-semibold py-2 px-4 border border-gray-300 rounded mr-2">Cancelar</button>
                                        <button id="confirmDeleteButton" class="bg-red-500 hover:bg-red-600 text-black hover:text-white font-semibold py-2 px-4 border border-red-500 rounded">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        // Escuchadores de eventos para mostrar y ocultar el modal de confirmación
                        document.getElementById('deleteButton').addEventListener('click', function() {
                            document.getElementById('confirmationModal').classList.remove('hidden');
                        });
                    
                        document.getElementById('cancelButton').addEventListener('click', function() {
                            document.getElementById('confirmationModal').classList.add('hidden');
                        });
                    
                        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                            // Hacer la solicitud AJAX para eliminar el elemento
                            fetch('{{ route("empresas.destroy", $empresa->id) }}', {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({})
                            })
                            .then(response => {
                                if (response.ok) {
                                    console.log('La eliminación fue exitosa.');
                                    // Redirigir a la página empresas.index (raíz "/")
                                    window.location.href = '/';
                                } else {
                                    console.error('Error al eliminar el elemento.');
                                }
                            })
                            .catch(error => {
                                console.error('Error al eliminar el elemento:', error);
                            })
                            .finally(() => {
                                // Cerrar el modal de confirmación
                                document.getElementById('confirmationModal').classList.add('hidden');
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
