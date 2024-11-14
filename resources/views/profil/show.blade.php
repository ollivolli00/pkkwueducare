<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Pengguna</title>

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
            <img src="{{ asset('img/bannerr.png') }}" class="w-full rounded-lg mb-8">
            <h2 class="text-2xl font-semibold text-center">Profil Pengguna</h2>
            <div class="mt-8">
                <div class="mb-4">
                    <label for="namalengkap" class="block text-gray-700"><strong>Nama Lengkap :</strong></label>
                    <p class="w-full px-4 py-2 border rounded-lg">{{ $penggunas->namalengkap }}</p>
                </div>
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-gray-700"><strong>Tanggal Lahir :</strong></label>
                    <p class="w-full px-4 py-2 border rounded-lg">{{ $penggunas->tanggal_lahir }}</p>
                </div>
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-gray-700"><strong>Jenis Kelamin :</strong></label>
                    <p class="w-full px-4 py-2 border rounded-lg">{{ $penggunas->jenis_kelamin }}</p>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700"><strong>Email :</strong></label>
                    <p class="w-full px-4 py-2 border rounded-lg">{{ $penggunas->email }}</p>
                </div>
                <div class="mb-4">
                    <label for="no_telp" class="block text-gray-700"><strong>No. Telepon :</strong></label>
                    <p class="w-full px-4 py-2 border rounded-lg">{{ $penggunas->no_telp }}</p>
                </div>
                @if ($penggunas->image)
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700"><strong>Upload File :</strong></label>
                        <img src="{{ asset('storage/images/' . $penggunas->image) }}" alt="Upload File" class="rounded-lg" style="width: 150px; height: auto;">
                    </div>
                @endif
                <div class="mt-10 text-center">
                    <a href="{{ route('pengguna.edit', $penggunas->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('pengguna.destroy', $penggunas->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>