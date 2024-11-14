<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profil</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>

<body class="bg-gray-100 font-roboto">

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                <div class="header__logo">
                        <a href="{{'/'}}"><img src={{asset("img/logo.png")}} alt="" width="150px;" height="50px;"></a>
                    </div>
                </div>
                <div class="col-lg-6">
    <nav class="header__menu">
        <ul>

                <li><a href="{{'/'}}" style="text-align:center; ">Home</a></li>   
                <li>
    <a href="{{ route('about') }}" style="text-align:center;">About</a>
</li>            </li>    
            @guest
<li>
    <a href="{{ route('signup') }}" style="text-align:center; color:white; padding: 10px 15px 12px; background: #7fad39;">Daftar Sebagai Perusahaan</a>
</li>
@endguest

<li class="nav-item dropdown">
    @auth
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        @if (Auth::user()->profile) <!-- Cek jika profil ada -->
                <a href="{{ route('pengguna.show', Auth::user()->profile->id) }}">Profile</a>   
            @else
                <a href="{{ route('pengguna.create') }}">Profile</a>
            @endif  
        <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @else
        <a href="{{ route('login') }}" style="color:white; padding: 10px 15px 12px; background: #7fad39;">Login</a>
    @endauth
</li>

        </ul>
        </nav>
</div>        
</div>
        </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
   

    <main class="container mx-auto mt-6">
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-lg p-6">
            <img src="{{ asset('img/bannerr.png') }}" class="w-full rounded-lg mb-6">
            <h2 class="text-2xl font-semibold text-center">Edit Profilmu Sekarang!</h2>
            
            <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="namalengkap" class="block text-gray-700">Nama Lengkap:</label>
                    <input type="text" name="namalengkap" id="namalengkap" value="{{ $pengguna->namalengkap }}" class="w-full px-4 py-2 border rounded-lg @error('namalengkap') border-red-500 @enderror">
                    @error('namalengkap')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-gray-700">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $pengguna->tanggal_lahir }}" class="w-full px-4 py-2 border rounded-lg @error('tanggal_lahir') border-red-500 @enderror">
                    @error('tanggal_lahir')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-gray-700">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="w-full px-4 py-2 border rounded-lg">
                        <option value="laki-laki" {{ $pengguna->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ $pengguna->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $pengguna->email }}" class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="no_telp" class="block text-gray-700">No. Telepon:</label>
                    <input type="tel" name="no_telp" id="no_telp" value="{{ $pengguna->no_telp }}" class="w-full px-4 py-2 border rounded-lg @error('no_telp') border-red-500 @enderror">
                    @error('no_telp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Upload File (Opsional):</label>
                    <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg @error('image') border-red-500 @enderror">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
            </form>
        </div>
    </main>

    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select .min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>