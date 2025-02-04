
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDUCARE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Css Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
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
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    

    <!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">  
            <div class="col-lg-12 text-center">
            <div class="col-lg-12 pt-12">
                <img src="img/bannerr.png" style="width: 100%; transform: scale(1); border-radius: 40px;">
            </div>
            <div style="margin-top: 50px;">
    <div id="app">
        <search-beasiswa></search-beasiswa>
    </div>

    <div class="header__search ml-6 mr-6" style="position: relative; width: 100%;">
    <form action="{{ route('search') }}" method="get" style="display: flex; align-items: center; width: 97%; ">
        <input type="text" id="search-input" name="query" placeholder="Search..." style="padding: 10px; border: 1px solid #ccc; flex-grow: 1; color: #333; font-family: 'Cairo', sans-serif;">
        <button type="submit" style="padding: 11px; width: 80px; border: none; background: #7fad39; color: white; cursor: pointer;">
            <i class="fa fa-search" style="font-size: 16px;"></i>
        </button>
    </form>

   
</div>

</div>

            
        </div>
    </div>
</section>
<!-- Hero Section End -->
<section class="categories py-10">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold text-left mb-6 ml-4">Hasil Pencarian: "{{ $searchQuery }}"</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ml-4">
    @forelse ($beasiswa as $item)
        <a href="{{ route('beasiswaa.show', $item->id) }}" class="border rounded-2xl p-6 flex flex-col items-center bg-white shadow-md hover:shadow-lg transition-shadow duration-300">
        <div class="w-[200px] h-[90px] flex justify-center items-center rounded-md overflow-hidden bg-gray-100">
    <img 
        alt="{{ $item->namabeasiswa }}" 
        src="{{ asset('storage/images/' . $item->image2) }}" 
        class="w-full h-full object-cover" 
    />
</div>

            <h5 class="text-lg font-bold text-center mt-3 text-gray-900">{{ $item->namabeasiswa }}</h5>
            <p class="text-gray-600 font-semibold text-center">{{ $item->deskripsi }}</p>
            <p class="text-xs mt-2 
    {{ \Carbon\Carbon::parse($item->batasbeasiswa)->isPast() ? 'text-red-500' : 'text-gray-500' }}">
    Batas Waktu: {{ \Carbon\Carbon::parse($item->batasbeasiswa)->format('d M Y') }}
</p>

        </a>
    @empty
        <p class="text-center col-span-4 text-gray-500">Tidak ada beasiswa yang ditemukan.</p>
    @endforelse
</div>

</section>


   <!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <!-- Konten lain dalam footer bisa tetap di dalam container jika tidak ingin full width -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Bagian ini bisa diisi konten lain jika diperlukan -->
            </div>
        </div>
    </div>

    <!-- Pindahkan footer__copyright ke luar container untuk lebar penuh -->
    <div class="footer__copyright" style="background: #7fad39; width: 100%;">
        <div class="container">
            <div class="footer__copyright__text">
                <img src="img/logo.png" alt="" width="120px" height="50px">
            </div>
            <div class="footer__copyright__payment">
            <p style="color: #ffffff;" class="pt-2">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Educare.com
                </p>
            </div>
        </div>
    </div>
</footer>
 <!-- Footer Section End -->

    <!-- Js Plugins -->
     <!-- Include Bootstrap JS -->


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>


<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>

