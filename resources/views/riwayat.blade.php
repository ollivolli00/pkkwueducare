<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Pendaftaran </title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" />

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

<body class="bg-gray-100 font-roboto" >

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
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="padding-left: 15px;">
    @if (Auth::user()->profile) <!-- Cek jika profil ada -->
        <a href="{{ route('pengguna.show', Auth::user()->profile->id) }}">Profile</a> 
        <a href="{{ route('riwayat' )}}">Riwayat Pendaftaran</a>   
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
    <main class="container mx-auto mt-6" >
    <div class="section-title mt-4">
                        <h2 center>RIWAYAT LAMARAN</h2>
                    </div>   
                    <div class="bg-white shadow-md rounded-3xl p-6 relative overflow-hidden">
    <div class="relative z-10">
        <div class="min-w-full bg-white mt-6 mb-6 px-6">
        <table class="min-w-full">
    <thead>
        <tr>
            <th class="py-3 px-6 bg-[#DCFFA7FF] text-left" 
                style="color:#7fad39; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);">
                Beasiswa
            </th>
            <th class="py-2 px-4 bg-[#DCFFA7FF] text-left" 
                style="color:#7fad39; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);">
                Tanggal Pendaftaran
            </th>
            <th class="py-2 px-4 bg-[#DCFFA7FF] text-left" 
                style="color:#7fad39; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);">
                Tahapan Terakhir
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="py-2 px-4 pt-6 border-t ">
                <br>
                {{ $item->beasiswa->namabeasiswa ?? '-' }}
                <br><br>
            </td>
            <td class="py-2 px-4 pt-6 border-t ">
                {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i') }}
            </td>
            <td class="py-2 px-4 pt-6 border-t font-bold">
    <div class="flex items-center space-x-2">
        <span class="text-sm py-1 px-3 rounded-full"
            style="background-color: {{ $item->status == 'DITOLAK' ? '#FFC2C2FF' : '#DCFFA7FF' }}; 
                   color: {{ $item->status == 'DITOLAK' ? '#D10000FF' : '#7fad39' }}; 
                   box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);">
            {{ $item->status }}
        </span>
    </div>
</td>

        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center space-x-2">
                        <label class="text-sm" for="entries">Show</label>
                        <select class="border rounded-lg py-1 px-2 text-sm" id="entries">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-sm">
                            Results: 1 - 1 of 1
                        </span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="text-gray-500">
                            <i class="fas fa-angle-double-left"></i>
                        </button>
                        <button class="text-gray-500">
                            <i class="fas fa-angle-left"></i>
                        </button>
                        <button class="bg-[#7fad39]  text-white py-1 px-3 rounded-full">
                            1
                        </button>
                        <button class="text-gray-500">
                            <i class="fas fa-angle-right"></i>
                        </button>
                        <button class="text-gray-500">
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    </div>
                </div>
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