<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - Akses Ditolak</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-lg max-w-md w-full text-center border border-gray-200">
        <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4 font-bold text-2xl">
            !
        </div>
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">403</h1>
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Akses Ditolak</h2>
        <p class="text-gray-600 mb-6 text-sm">
            {{ $message ?? 'Maaf, Anda tidak memiliki hak akses untuk membuka halaman ini.' }}
        </p>
        <a href="{{ route('pos.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-5 rounded-lg transition-colors shadow-sm">
            Kembali ke Kasir (POS)
        </a>
    </div>
</body>
</html>