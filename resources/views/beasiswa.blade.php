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
            <a href ="#"><i class="fa fa-pinterest-p"></i></a>
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
        <div class="header__top">
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
                                <li><a href="{{ 'about' }}" style="text-align:center; ">About</a></li>    
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
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <main class="container my-5">
        <div class="text-center mb-4">
            <img alt="BCA logo" class="mx-auto" height="150" src="https://storage.googleapis.com/a1aa/image/hAY8cM4BtfTsIqGa3nRw6nZodxjeEeFzvd8leprs4iLiBV8OB.jpg" width="300"/>
        </div>
        <div class="bg-white shadow rounded-lg p-4 mb-4">
            <div class="d-flex align-items-center mb-4">
                <img alt="BCA logo" class="h-12 w-12" height="50" src="https://storage.googleapis.com/a1aa/image/hAY8cM4BtfTsIqGa3nRw6nZodxjeEeFzvd8leprs4iLiBV8OB.jpg" width="50"/>
                <div class="ml-3">
                    <h1 class="h4 font-weight-bold">Beasiswa BCA</h1>
                    <p class="text-muted">by Bank BCA</p>
                    <p class="text-muted">Batas Waktu: 14/09/2024</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3">
                        <i class="fas fa-graduation-cap text-2xl text-gray-600 mr-2"></i>
                        <p class="font-bold">Pendidikan</p>
                        <p>Minimal pendidikan SMA/SMK</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3">
                        < <i class="fas fa-user text-2xl text-gray-600 mr-2"></i>
                        <p class="font-bold">Usia</p>
                        <p>Maksimal 19 tahun</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3">
                        <i class="fas fa-calendar-alt text-2xl text-gray-600 mr-2"></i>
                        <p class="font-bold">Periode Program</p>
                        <p>2.5 Tahun</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3">
                        <i class="fas fa-book text-2xl text-gray-600 mr-2"></i>
                        <p class="font-bold">Program Pendidikan</p>
                        <p>Bisnis dan Perbankan & Teknik Informatika</p>
                    </div>
                </div>
            </div>
            <h2 class="h5 font-weight-bold mb-3">Persyaratan</h2>
            <ul class="list-unstyled mb-4">
                <li>Warga negara Indonesia</li>
                <li>Siswa/siswi kelas XII / lulusan SMA/SMK</li>
                <li>Rata-rata nilai rapor kelas X, XI, dan XII minimal 7,50*</li>
                <li>Rata-rata nilai matematika kelas X, XI, dan XII (SMA IPA, IPS) atau nilai Produktif kelas X, XI, dan XII (khusus SMK) minimal 7,50*</li>
                <li>(Silahkan mengisi angka "0.00" pada kolom nilai rapor kelas XI semester 2 (jika nilai rapor belum keluar))</li>
                <li>Tidak pernah tinggal kelas dari SD-SMA/SMK</li>
                <li>Tidak pernah terlibat narkoba dan pelanggaran hukum lainnya</li>
                <li>Lulus dalam proses seleksi (Seleksi Administrasi, Tes Online, Tes Psikologi, Wawancara I, Wawancara II & Tes Kesehatan)</li>
            </ul>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="border border-gray-300 rounded-lg p-3">
                        <i class="fas fa-map-marker-alt text-2xl text-gray-600 mr-2"></i>
                        <p class="font-bold">Lokasi Pendidikan</p>
                        <p>Bertempat di BCA Learning Institute, Bogor</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border border-gray-300 rounded-lg p-3">
                        <i class="fas fa-clock text-2xl text-gray-600 mr-2"></i>
                        <p class="font-bold">Jam Belajar</p>
                        <p>Senin - Jumat Pukul 08:00 - 17:00 WIB</p>
                    </div>
                </div>
            </div>
            <h2 class="h5 font-weight-bold mb-4">Benefit Yang Didapat Melalui Beasiswa BCA</h2>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3 text-center">
                        <img alt="Buku pelajaran dan laptop" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/tDaldhojid4cO9wiLjTeQ15dLAIkuWWGp1SvEh1wFZoMoi3JA.jpg" width="100"/>
                        <p>Disediakan buku pelajaran sepanjang program pembelajaran berlangsung dan laptop (khusus untuk PPTI).</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3 text-center">
                        <img alt="Uang saku bulanan" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/I3knYFwFpz7BK5OfjKMvDUyRrmbjbT0EjF4YTtBwE5QNoi3JA.jpg" width="100"/>
                        <p>Bebas biaya pendidikan dan mendapatkan uang saku bulanan.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3 text-center">
                        <img alt="Kesempatan magang" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/7eKOO7BdE1yyUyi9eoNeHojFPCUlUyQLnIzxKe9JLAa2BV8OB.jpg" width="100"/>
                        <p>Mendapatkan kesempatan magang dan penawaran kerja BCA.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border border-gray-300 rounded-lg p-3 text-center">
                        <img alt="Dormitory, shuttle bus, dan makan siang" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/f0DtmjyFe3nELkkWfNMbfoXu457pcPJQbJ2U1DtN2q0uBV8OB.jpg" width="100"/>
                        <p>Dormitory, shuttle bus, dan makan siang.</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary">DAFTAR</button>
            </div>
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