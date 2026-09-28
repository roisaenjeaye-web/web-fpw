<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Kasir (POS)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Sistem Kasir & Transaksi</h3>
                        <p class="text-sm text-gray-500">Petugas Kasir: <span class="font-semibold text-indigo-600">{{ auth()->user()->name }}</span> (Role: {{ auth()->user()->role }})</p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 font-medium px-4 py-2 rounded-lg text-sm transition">
                            Keluar / Logout
                        </button>
                    </form>
                </div>

                <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 text-indigo-800 text-sm">
                    Selamat bertugas, <strong>{{ auth()->user()->name }}</strong>. Halaman transaksi POS siap digunakan.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
