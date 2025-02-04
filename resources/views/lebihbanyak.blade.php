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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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
 <!-- Humberger Begin -->
     <!-- Page Preloder -->
     <div id="preloder">
        <div class="loader"></div>
    </div>
 <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                
            <li><a href="{{'/'}}" >Home</a></li>   
              <li>  <a href="{{ 'about' }}">About</a>   
            </li>    <br>
            @guest
<li>
    <a href="{{ route('signup') }}" style="text-align:center; color:white; padding: 10px 15px 12px; background: #7fad39;">Daftar Sebagai Perusahaan</a>
</li>
@endguest
<br>
                <li class="nav-item dropdown">
    @auth
        <a id="navbarDropdown" class="" href="#" style="text-align:center;" role="button">
            {{ Auth::user()->name }}
        </a>
        <ul class="header__menu__dropdown">
            @if (Auth::user()->profile) <!-- Cek jika profil ada -->
                <li><a href="{{ route('pengguna.show', Auth::user()->profile->id) }}">Profile</a></li>
                <li><a href="{{ route('riwayat') }}">Riwayat Pendaftaran</a></li>
            @else
                <li><a href="{{ route('pengguna.create') }}">Profile</a></li>
            @endif
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    @else
        <a href="{{ route('login') }}" style="color:white; padding: 10px 15px 12px; background: #7fad39;">Login</a>
    @endauth
</li>


            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
        <a href="https://www.facebook.com/profile.php?id=100054859316679&mibextid=ZbWKwL"><i class='fa fa-facebook'></i></a>
                    <a href="https://x.com/rgnaov"><i class='fa fa-twitter'></i></a>
                    <a href="https://www.instagram.com/rgnaov/?utm_source=ig_web_button_share_sheet"><i class='fa fa-instagram'></i></a>

        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> educare@gmail.com</li>
                <li><i class="fa fa-phone"> +62 881-9540-957</i></li>
            </ul>
        </div>
    </div>
   
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