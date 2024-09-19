<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Panel de Control - Sistema de Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-3xl font-extrabold text-gray-800 dark:text-gray-200 mb-8 text-center">
                    Bienvenida, Administradora
                </h3>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 text-center">
                    Selecciona uno de los locales para gestionar su inventario.
                </p>

                <!-- Contenedor de Locales -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($locales as $local)
                    <!-- Tarjeta de Local -->
                    <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition-transform transform hover:-translate-y-2">
                        <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                            {{ $local->nombre }}
                        </h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Ubicación: {{ $local->ubicacion }}</p>
                        <!-- Botón para ver el inventario -->
                        <a href="{{ route('inventario.index', ['localId' => $local->id]) }}">
                            <button class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-full hover:from-blue-600 hover:to-indigo-700 transition-colors duration-300">
                                Ver Inventario
                            </button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
