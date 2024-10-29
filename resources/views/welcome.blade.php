<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #FABC2A, #9197AE);
            color: white;
        }
    </style>
</head>

<body class="w-full h-full">
    <!-- Header -->
    <header class="flex w-full justify-between items-center px-12 py-6 mb-12">
        <div class="flex items-center space-x-2"> <!-- Added a container for logo and text -->
            <img src="{{ asset('logo.png') }}" alt="Inventy" class="w-10 h-15"> <!-- Adjusted size for logo -->
            <span class="text-white font-bold text-xl">INVENTY</span> <!-- Text beside the logo -->
        </div>
        <div class="flex space-x-6 items-center">
            <a href="/login" class="text-white font-bold">Sign In</a>
            <a href="/register" class="bg-red-600 px-4 py-2 text-white font-bold rounded-lg">Sign Up</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center text-center">
        <!-- Main Section -->
        <section class="flex flex-col items-center space-y-4">
            <h1 class="text-5xl font-bold">PEMASOK KEBUTUHAN LANGSUNG DARI PABRIK KE PELANGGAN</h1>
            <p class="text-xl">Kualitas Terbaik Dengan Harga Pabrik, Langsung Di Antar Ke Lokasi Anda</p>
            <a href="/" class="bg-red-600 px-6 py-3 text-white font-bold rounded-lg mt-6">Penawaran Khusus</a>
        </section>

        <!-- Image Section -->
        <section class="mt-12">
            <img src="page1a.png" alt="Main Image" class="max-w-full">
        </section>
    </main>
</body>

</html>
