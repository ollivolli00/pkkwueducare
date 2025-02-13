
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
            
            <!-- <div class="row"> -->
                <!-- <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div> -->
                <!-- </div> -->
                <!-- <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div> -->
                   
<!--                         
                    </div> -->
                    
                        <br>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
        
        <div class="section-title">
                        <h2 center>TENTANG KAMI</h2>
                    </div>   
                    <div class="flex items-center mb-4">
                    <p class="text-lg" style="text-align: left; width: 80%; margin: 0 auto;">
       Selamat datang di EduCare, EduCare adalah platform yang didedikasikan untuk membantu pelajar dan mahasiswa menemukan beasiswa yang sesuai dengan kebutuhan mereka. Kami menyediakan informasi terbaru tentang berbagai macam beasiswa, baik untuk dalam negeri maupun luar negeri, dengan tujuan mempermudah akses pendidikan bagi semua kalangan.
                    </p>
                    <br>
                    <p class="text-lg" style="text-align: left; width: 80%; margin: 0 auto;">
                    Dengan EduCare, Anda dapat menelusuri berbagai pilihan beasiswa berdasarkan kriteria seperti bidang studi, jenjang pendidikan, lokasi, dan persyaratan khusus. Kami juga memberikan panduan praktis dalam proses pendaftaran beasiswa, mulai dari persiapan dokumen hingga tips seleksi.

Visi kami adalah menciptakan generasi yang memiliki kesempatan pendidikan yang setara dan merata, sementara misi kami adalah menyediakan informasi beasiswa yang terjangkau, akurat, dan mudah diakses oleh semua orang.      </p>

                    </p>
     </div>
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Call Center</h4>
                        <p>+62 813-3535-9018</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>educare@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

            <div class="row">
         
                </div>
            </div>
        </div>
    </section>
  
  <!-- Footer Section Begin --><footer class="footer spad">
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

<!-- Include Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>



</body>

</html>