<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDUCARE</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Css Styles -->
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    
<body class="bg-white text-gray-800">

    <!-- Navbar Mulai -->
    <header class="header">
    <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{'/'}}"><img src="img/logo.png" alt="" width="150px;" height="50px;"></a>
                    </div>
                </div>
                <div class="col-lg-6">
    <nav class="header__menu">
        <ul>

                <li><a href="{{'/'}}" style="text-align:center; ">Home</a></li>   
              <li>  <a href="{{ 'about' }}" style="text-align:center; ">About</a>   
            </li>    
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
   
    <!-- Navbar Selesai -->
    <div class="w-full p-4">
    @if(isset($beasiswaa) && $beasiswaa->count() > 0)
        @foreach($beasiswaa as $key => $beasiswa)
            @if($beasiswa->is_published == 1)
                <a href="{{ route('beasiswaa.show', $beasiswa->id) }}" class="block mt-4 p-3 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                    <div class="flex items-center">
                        <img alt="Logo {{ $beasiswa->namaperusahaan }}" class="w-12 h-12 mr-4" height="50" src="{{ asset('storage/images/' . $beasiswa->image2) }}" width="50"/>
                        <div>
                            <h2 class="text-lg font-semibold">{{ $beasiswa->namabeasiswa }}</h2>
                            <p class="text-gray-600 text-sm">by {{ $beasiswa->namaperusahaan }}</p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-wrap">
                        @if(isset($beasiswa->miniisi))
                            @if(is_array($beasiswa->miniisi))
                                <div class="flex space-x-2 mt-2">
                                    @foreach($beasiswa->miniisi as $miniisi)
                                        <div class="p-2 rounded-md text-center">
                                            <p class="text-gray-600 text-base">
                                                {{ $miniisi }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="p-2 rounded-md text-center">
                                    <p class="text-gray-600 text-base">
                                        {{ $beasiswa->miniisi }}
                                    </p>
                                </div>
                            @endif
                        @else
                            <p class="text-gray-400 mt-2 text-sm">
                                No miniisi available.
                            </p>
                        @endif
                    </div>
                </a>
            @endif
        @endforeach
    @else
        <p class="text-center text-gray-600">Tidak ada beasiswa yang tersedia.</p>
    @endif
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Js Plugins -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>