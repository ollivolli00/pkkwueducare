<!DOCTYPE html>
<html lang="zxx">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
        <style>
        body {
            font-family: Arial, sans-serif;
        }

        .main-content {
            text-align: center;
            padding: 20px;
        }

        .main-content img {
            max-width: 100%;
            height: auto;
        }

        .scholarship-info {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin: 30px 0;
            text-align: left;
            margin-top: 50px;
        }

        .scholarship-info img {
            height: auto;
            margin-right: 15px;
        }

        .scholarship-info h1 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .scholarship-info p {
            font-size: 14px;
            margin: 0;
        }

        .requirements,
        .benefits {
            text-align: left;
            margin: 20px 0;
        }

        .requirements ul {
            list-style: none;
            padding: 0;
            font-size: 14px;
        }

        .requirements ul li {
            margin-bottom: 10px;
        }

        .requirements h4 {
            font-weight: bold;
        }

        .benefits .card {
            width: auto; /* Atur lebar sesuai kebutuhan */
            height: auto; /* Tinggi otomatis menyesuaikan konten */
            border-radius: 15px; /* Kelengkungan pojok */
            text-align: center;
        }

        .benefits .card img {
            height: 100px;
            margin-bottom: 10px;
        }

        .benefits h4 {
            font-weight: bold;
        }

        .btn-register {
            background-color: #1a73e8;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            width: 150px;
            margin: 0 auto;
            display: block;
        }

        /* Additional spacing between rows and smaller font-size for general text */
        .row {
            margin-top: 20px;
        }

        p {
            font-size: 14px;
        }

        h4 {
            font-size: 18px;
        }

        .card-body p {
            font-size: 14px;
        }

        .card {
        width: auto; /* Atur lebar sesuai kebutuhan */
        height: auto; /* Tinggi otomatis menyesuaikan konten */
        margin: 5px; /* Jarak antar kartu */
        border-radius: 15px; /* Kelengkungan pojok */
        }

    </style>
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
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
        <!-- <div class="header__top">
            <div class="container">
                <div class="row">
                  
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt="" width="150px;" height="50px;"></a>
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
    <a href="{{ 'signup' }}" style="text-align:center; color:white; padding: 10px 15px 12px; background: #7fad39;">Daftar Sebagai Perusahaan</a>
    </li>
    @endguest
<li class="nav-item dropdown">
    @auth
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a href="{{'profil'}}">Profile</a>   
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
        

    <!-- Header Section End -->

    <div class="main-content">
        <img alt="Djarum Logo" height="200" src="img/djarumm.png" width="600">
        <div class="container">
            <div class="scholarship-info">
                <img alt="Djarum Logo" height="200" src="img/djrumkcl.png" width="200">
                <div>
                    <h1>Beasiswa Djarum Plus</h1>
                    <p>by PT Djarum</p>
                    <p style="color: red;">Batas Waktu: 30/05/2024</p>
                </div>
            </div>

            <div class="row text-center mt-4">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-graduation-cap fa-lg" style="margin-right: 10px;"></i> 
                                <h5 class="mb-0" style="font-size: 1rem; margin-bottom: 0;">Pendidikan</h5> 
                            </div>
                            <p class="mb-1" style="text-align: left;">Strata 1 / Diploma 4</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-user fa-lg" style="margin-right: 10px;"></i> 
                                <h5 class="mb-0" style="font-size: 1rem; margin-bottom: 0;">Usia</h5> 
                            </div>
                            <p class="mb-1" style="text-align: left;">Tidak ada batas usia</p> 
                        </div>
                    </div>
                </div>

            <div class="requirements mt-5">
                <h4>Persyaratan</h4>
                <ul class="mt-3">
                    <li>Sedang menempuh pendidikan Strata 1/Diploma 4 di semester IV. dari semua disiplin ilmu</li>
                    <li>IPK minimum 3.00 pada semester III, serta dapat mempertahankan IPK minimum 3.00 hingga akhir semester IV</li>
                    <li>Aktif mengikuti kegiatan organisasi baik di dalam maupun luar kampus</li>
                    <li>Tidak sedang menerima beasiswa dari pihak lain</li>
                    <li>Kuliah di mitra perguruan tinggi Program Djarum Beasiswa Plus</li>
                </ul>
            </div>

            <div class="requirements mt-3">
                <h4>Persyaratan Administrasi Pendaftaran</h4>
                <ul class="mt-3">
                    <li>Scan pas foto ukuran 4 x 6 cm berwarna, memakai jas aimamater (format file jpg atau png dengan ukuran maksimal 500 KB)</li>
                    <li>Scan Kartu Tanda Mahasiswa (format file jpg atau png dengan ukuran maksimal 500 KB)</li>
                    <li>Scan Kartu Tanda Penduduk (format file jpg atau png dengan ukuran maksimal 500 KB)</li>
                    <li>Scan Transkrip Nilai sampai dengan semester III dan IPK yang telah dilegalisir otoritas kampus (format file pdf dengan ukuran maksimal 1 MB)</li>
                    <li>Scan Salinan Surat Keterangan/sertifikat aktif berorganisasi dan atau sertifikat kepanitiaan dan atau sertifikat prestasi yang diikuti / dimiliki (format file pdf dengan ukuran maksimal 1 MB)</li>
                    <li>Scan Surat keterangan dari kampus bahwa tidak sedang menerima beasiswa dari pihak lain (contoh untuk pendaftar 2024 adalah terhitung periode 1 September 2024 31 Agustus 2025). Format file pdf dengan ukuran maksimai 500 KB.</li>
                </ul>
            </div>

            <div class="benefits mt-4">
                <h4>Benefit Yang Didapat Melalui Beasiswa Djarum Plus</h4>
                <div class="row text-center">
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <img alt="3" src="img/dapat.png" class="img-fluid mx-auto d-block" style="height: 150px; width: auto;">
                                <p class="mt-2">Mendapatkan dana beasiswa Rp. 1.000.000 per bulan selama 1 tahun</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <img alt="4" src="img/tiga.png" class="img-fluid mx-auto d-block" style="height: 150px; width: auto;">
                                <p class="mt-2">Mendapatkan pembekalan soft skills untuk menyeimbangi pencapaian akademik yang diperoleh di kampus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <a href="#" style="color: white; border-radius: 5px; padding: 5px 30px; background: #1a73e8; font-family: Cairo;">DAFTAR</a>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
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
