<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts and Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
</head>

<body class="bg-gray-100 font-roboto">

<header class="header">
    <div class="container mx-auto p-4">
        <img src="img/bannerr.png" style="width: 100%; transform: scale(1); border-radius:40px;">
        <h1 class="text-3xl text-center">Aplikasi Profil Pengguna</h1>
        <nav class="mt-4">
            <ul class="flex justify-center space-x-4">
                <li><a href="{{ route('pengguna.index') }}" class="text-blue-600">Home</a></li>
                <li><a href="{{ route('pengguna.create') }}" class="text-blue-600">Buat Profil</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container mx-auto mt-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-center text-2xl mb-4">Buat Profilmu Sekarang!</h2>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="namalengkap" class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="namalengkap" id="namalengkap" placeholder="Masukkan Nama Lengkap Anda..." class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
            <div class="mb-6">
                <label for="tanggal_lahir" class="block text-gray-700 font-bold mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
            <div class="mb-6">
                <label for="jenis_kelamin" class="block text-gray-700 font-bold mb-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full px-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email Lengkap Anda..." class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
            <div class="mb-6">
                <label for="no_telp" class="block text-gray-700 font-bold mb-2">No. Telepon</label>
                <input type="tel" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Telepon Anda..." class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-bold mb-2">Upload File</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 border rounded-full" required />
                <p class="text-gray-500 text-sm mt-1">Maksimal ukuran file foto: 3MB. File extension: png, jpg, jpeg.</p>
                <p class="text-gray-500 text-sm">Contoh File: pas foto 3x4, scan KK, scan KTP, dll.</p>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Simpan</button>
        </form>
    </div>
</main>

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>