<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Kotak Card Utama -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h3 class="text-lg font-bold mb-2">Ringkasan Hari Ini</h3>
                <p class="text-gray-600 mb-4">Selamat datang, Admin Toko.</p>
                
                <!-- Posisikan badge di dalam div card ini -->
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500">Contoh Status Stok:</span>
                    <x-badge status="aman">Aman</x-badge>
                    <x-badge status="menipis">Menipis</x-badge>
                    <x-badge status="habis">Habis</x-badge>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>