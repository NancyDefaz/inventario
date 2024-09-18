<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Control - Sistema de Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
                    Bienvenida, Administradora
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Selecciona uno de los locales para gestionar su inventario.
                </p>

                <!-- Sección de Locales -->
                @foreach ($locales as $local)
                <!-- Aquí solo necesitamos un bloque 'div' por local -->
                <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ $local->nombre }}</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Ubicación: {{ $local->ubicacion }}</p>
                    <!-- Botón para ver el inventario -->
                    <a href="{{ route('inventario.index', ['localId' => $local->id]) }}">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Ver Inventario</button>
                    </a>
                    <!-- Botón para agregar una prenda -->
                    <a href="{{ route('inventario.create', ['localId' => $local->id]) }}">
                        <button class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">Agregar Prenda</button>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
