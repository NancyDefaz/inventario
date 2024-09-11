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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Local 1 -->
                    <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Local 1</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Ubicación: Av. Central</p>
                        <a href="{{ route('inventario.index') }}">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                                Ver Inventario
                            </button>
                        </a>
                    </div>

                    <!-- Local 2 -->
                    <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Local 2</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Ubicación: Plaza Norte</p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                            Ver Inventario
                        </button>
                    </div>

                    <!-- Local 3 -->
                    <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Local 3</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Ubicación: Centro Histórico</p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                            Ver Inventario
                        </button>
                    </div>

                    <!-- Local 4 -->
                    <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Local 4</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Ubicación: Mall Sur</p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                            Ver Inventario
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
