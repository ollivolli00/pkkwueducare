
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
    <div class="main-content">
    @if(session('profile_incomplete'))
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-lg flex items-center mb-6">
        <div class="flex-shrink-0">
            <!-- Ikon -->
            <svg class="h-6 w-6 text-yellow-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10c0 4.418-3.582 8-8 8a8 8 0 110-16c4.418 0 8 3.582 8 8zm-9 4a1 1 0 102 0v-2a1 1 0 00-2 0v2zm0-8a1 1 0 100 2h.01a1 1 0 000-2H9z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="flex-grow">
            <p class="font-semibold">
                {{ session('profile_incomplete') }}
            </p>
            <p class="text-sm text-gray-700">
                Melengkapi profil dapat membantu Anda untuk mendaftar beasiswa yang tersedia.
            </p>
        </div>
        <div>
            <a href="{{ route('pengguna.create', auth()->user()->id) }}" 
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200">
                Go to Profile
            </a>
        </div>
    </div>
@endif


</div>

    <!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">  
            <div class="col-lg-12 text-center">
            <div style="margin-top: 50px;">
    <div id="app">
        <search-beasiswa></search-beasiswa>
    </div>

    <div class="header__search" style="margin-bottom: 20px; position: relative;">
        <form action="{{ route('search') }}" method="get" style="display: flex; justify-content: center; align-items: center;">
            <input type="text" id="search-input" name="query" placeholder="Search..." style="padding: 10px; border: 1px solid #ccc; width: 100%; max-width: 500px; color: #333; font-family: 'Cairo', sans-serif;">
            <button type="submit" style="padding: 11px; width:80px; border: none; background: #7fad39; color: white; cursor: pointer;">
                <i class="fa fa-search" style="font-size: 16px;"></i>
            </button>
        </form>
        <!-- Hasil pencarian, tersembunyi saat tidak ada hasil -->
        <div id="search-results" style="display: none; position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; z-index: 1000; max-height: 200px; overflow-y: auto;">
            <!-- Hasil pencarian ditambahkan di sini -->
        </div>
    </div>
</div>

            <br>
            <div class="col-lg-12">
                <img src="img/bannerr.png" style="width: 100%; transform: scale(1); border-radius: 40px;">
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
        <div class="section-title">
                        <h2 center>MITRA KAMI</h2>
                    </div>   
            <div class="row">
         
                <div class="categories__slider owl-carousel">
                 
                <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/bcaa.png">
                            <h5><a href="https://karir.bca.co.id/beasiswa-bca">BANK BCA</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/djarum.png">
                            <h5><a href="https://djarumbeasiswaplus.org/">PT DJARUM</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/kemenkeu.png">
                            <h5><a href="https://ebeasiswa-lpdp.kemenkeu.go.id/Home">KEMENKEU RI</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/tut.png">
                            <h5><a href="https://beasiswaunggulan.kemdikbud.go.id/">KEMENDIKBUDRISTEK</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/tut.png">
                            <h5><a href="https://beasiswaunggulan.kemdikbud.go.id/">KEMDIKBUD</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <!-- <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-2.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-4.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-5.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-6.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-7.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-8.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Featured Section End -->
     <br>
     <br>
     <!-- Blog Section Begin -->
<section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Panduan Pendaftaran</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <img src="img/panduan beasiswa.png" style= "width: 100%; transform: scale(1); border-radius:40px;"> 
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <br>


     <!-- Rekomendasi Beasiswa Section Begin -->
     <section class="categories">
    <div class="container">
        <div class="section-title">
            <h2 class="text-center">Beasiswa Terbaru</h2>
        </div>
        
        <div class="row">
            @if($totalBeasiswa > 4)
                <div class="text-right mb-3">
                    <a href="{{'beasiswa-lebih-banyak'}}" style="color: #7fad39; font-weight: bold; font-size: 16px;">
                        Lihat Lebih Banyak
                    </a>
                </div>
            @endif
            <div class="categories__slider owl-carousel">
                @if($beasiswaa->isNotEmpty())
                    @foreach($beasiswaa->take(4) as $beasiswa)
                        <!-- Cek apakah beasiswa dipublikasikan -->
                        @if($beasiswa->is_published == 1)
                            <div class="col-lg-3">
                                <div class="border rounded-lg p-4 flex flex-col items-center min-w-[250px]">
                                    <div style="width: 200px; height: 90px; display: flex; justify-content: center; align-items: center; border-radius: 5px; overflow: hidden;">
                                        <img 
                                            alt="Logo {{ $beasiswa->namaperusahaan }}" 
                                            src="{{ asset('storage/images/' . $beasiswa->image2) }}" 
                                            style="max-width: 100%; max-height: 100%; object-fit: contain;" 
                                        />
                                    </div>
                                    <h5 class="text-lg font-bold" style="text-align:center;">{{ $beasiswa->namabeasiswa }}</h5>
                                    <p class="text-lg-gray-600 font-bold mb-4" style="text-align:center;">{{ $beasiswa->namaperusahaan }}</p>
                                    <p style="font-size: 12px; color: #777; margin-top: 3px;">Dipublikasikan: {{ $beasiswa->created_at->format('d M Y') }}</p>
                                    <a href="#" class="btn-daftar" data-url="{{ route('beasiswaa.show', $beasiswa->id) }}" style="color: white; border-radius: 5px; padding: 5px 30px; background: #7fad39; font-family: Cairo;">DAFTAR</a>

                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p>Tidak ada beasiswa yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Modal untuk Pendaftaran -->
<div id="loginModal" class="modal fade" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="top: 5px;"> <!-- Posisi modal lebih ke atas -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">EDUCARE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda perlu login terlebih dahulu untuk mendaftar beasiswa.</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('login') }}" class="primary-btn" style="background-color: #7fad39; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Pass Status Login ke dalam Elemen HTML -->
<div id="authStatus" data-logged-in="{{ auth()->check() ? 'true' : 'false' }}"></div>


<!-- Carousel untuk Beasiswa Paling Banyak Dilihat -->
<section class="featured spad">
    <div class="container">
        <div class="section-title">
            <h2>Beasiswa Paling Banyak Dilihat</h2>
        </div>
        @if($mostViewedBeasiswa->count() > 0) <!-- Memeriksa apakah ada beasiswa yang ditampilkan -->
            <div class="categories__slider owl-carousel">
                @foreach($mostViewedBeasiswa as $beasiswa)
                    <div class="col-lg-3">
                        <div class="border rounded-lg p-4 flex flex-col items-center min-w-[250px]">
                            <div style="width: 200px; height: 90px; display: flex; justify-content: center; align-items: center; border-radius: 5px; overflow: hidden;">
                                <img 
                                    alt="Logo {{ $beasiswa->namaperusahaan }}" 
                                    src="{{ asset('storage/images/' . $beasiswa->image2) }}" 
                                    style="max-width: 100%; max-height: 100%; object-fit: contain;" 
                                />
                            </div>
                            <h5 class="text-lg font-bold" style="text-align:center;">{{ $beasiswa->namabeasiswa }}</h5>
                            <p class="text-lg-gray-600 font-bold mb-4"> {{ $beasiswa->namaperusahaan }}</p>
                            <p style="font-size: 12px; color: #777; margin-top: 3px;">Dipublikasikan: {{ $beasiswa->created_at->format('d M Y') }}</p>
                            <a href="#" class="btn-daftar" data-url="{{ route('beasiswaa.show', $beasiswa->id) }}" style="color: white; border-radius: 5px; padding: 5px 30px; background: #7fad39; font-family: Cairo;">DAFTAR</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">Tidak ada beasiswa yang paling banyak dilihat saat ini.</p> <!-- Pesan jika tidak ada beasiswa -->
        @endif
    </div>
</section><!-- Rekomendasi Beasiswa Section End -->   
 
  
<!-- Carousel untuk Beasiswa Paling Banyak Dilihat -->
<section class="featured spad">
<div class="container">
        <div class="section-title">
            <h2>Beasiswa Paling Banyak Dilamar</h2>
        </div>
        @if($mostAppliedBeasiswa->count() > 0) <!-- Memeriksa apakah ada beasiswa yang ditampilkan -->
        <div class="categories__slider owl-carousel">
                @foreach($mostAppliedBeasiswa as $beasiswa)
                    <div class="col-lg-3">
                        <div class="border rounded-lg p-4 flex flex-col items-center min-w-[250px]">
                            <div style="width: 200px; height: 90px; display: flex; justify-content: center; align-items: center; border-radius: 5px; overflow: hidden;">
                                <img 
                                    alt="Logo {{ $beasiswa->namaperusahaan }}" 
                                    src="{{ asset('storage/images/' . $beasiswa->image2) }}" 
                                    style="max-width: 100%; max-height: 100%; object-fit: contain;" 
                                />
                            </div>
                            <h5 class="text-lg font-bold" style="text-align:center;">{{ $beasiswa->namabeasiswa }}</h5>
                            <p class="text-lg-gray-600 font-bold mb-4"> {{ $beasiswa->namaperusahaan }}</p>
                            <p style="font-size: 12px; color: #777; margin-top: 3px;">Dipublikasikan: {{ $beasiswa->created_at->format('d M Y') }}</p>
                            <a href="#" class="btn-daftar" data-url="{{ route('beasiswaa.show', $beasiswa->id) }}" style="color: white; border-radius: 5px; padding: 5px 30px; background: #7fad39; font-family: Cairo;">DAFTAR</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">Tidak ada beasiswa yang paling banyak dilamar saat ini.</p>
        @endif
    </div>
</section><!-- Rekomendasi Beasiswa Section End -->   
<br>
<br>
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/peluang.png" alt="" style="border-radius:30px;">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/dukung.png" alt="" style="border-radius:30px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Banner End -->
<br>
<br>
<br>
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

    <script>
    $(document).ready(function(){
        $('.latest-product__slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ["<div class='owl-nav-left'>←</div>", "<div class='owl-nav-right'>→</div>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>

<script>
    // Mengambil status login dari elemen HTML
    var isLoggedIn = document.getElementById('authStatus').getAttribute('data-logged-in') === 'true';

    document.querySelectorAll('.btn-daftar').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Menghentikan aksi default (navigasi ke halaman lain)

            // Ambil URL dari atribut data-url
            var routeUrl = this.getAttribute('data-url');
            
            // Cek apakah pengguna sudah login
            if (isLoggedIn) {
                // Jika sudah login, arahkan ke route URL
                window.location.href = routeUrl;
            } else {
                // Jika belum login, tampilkan modal
                var modal = new bootstrap.Modal(document.getElementById('loginModal'));
                modal.show();
            }
        });
    });
</script>

</body>

</html>