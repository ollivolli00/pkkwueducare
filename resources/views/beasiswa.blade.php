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
    
    <style>
        ul {
            list-style-type: disc !important; /* Menampilkan bullets */
            padding-left: 20px; /* Jarak di kiri */
        }

        li {
            margin-bottom: 5px;
        }

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

        .daftar {
            color: white; 
            border: none; /* Menghilangkan border */
            border-radius: 20px;
            padding: 5px 30px; 
            background: #1a73e8; 
            font-family: 'Cairo', sans-serif; /* Pastikan font Cairo sudah di-import */
            cursor: pointer; /* Mengubah kursor menjadi pointer */
            transition: background 0.3s; /* Efek transisi pada background */
        }

        .daftar:hover {
            background: #155ab6; /* Warna saat hover */
        }

        .modal-body {
            text-align: left; /* Mengatur teks dalam modal agar rata kiri */
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
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{asset('img/logo.png')}}" alt="" width="150px;" height="50px;"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class ="header__menu">
                        <ul>
                            <li><a href="{{'/'}}" style="text-align:center;">Home</a></li>
                            <li><a href="{{ 'about' }}" style="text-align:center;">About</a></li>
                            @guest
                            <li>
                                <a href="{{ 'signup' }}" style="text-align:center; color:white; padding: 10px 15px 12px; background: #7fad39;">Daftar Sebagai Perusahaan</a>
                            </li>
                            @endguest
                            <li class="nav-item dropdown">
                                @auth
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()-> name }}
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
    </header>
    <!-- Header Section End -->

    <div class="main-content">
    @if(isset($beasiswaa))
    <div class="flex justify-center items-center h-52 pl-5"> <!-- Menggunakan padding-left -->
    <img alt="Djarum Logo" src="{{ asset('storage/images/' . $beasiswaa->image1) }}" 
         class="h-100 rounded-[30px]"> <!-- Menggunakan kelas Tailwind untuk border-radius -->
</div>
<div class="container">
    <div class="scholarship-info" style="display: flex; align-items: center;">
        <img alt="Djarum Logo" height="200" src="{{ asset('storage/images/' . $beasiswaa->image2) }}" width="200" style="border-radius: 30px;">
        <div style="margin-left: 20px;"> <!-- Menambahkan margin kiri -->
            <h1 style="margin: 0;">{{$beasiswaa->namabeasiswa}}</h1>
            <p style="margin: 5px 0;">{{$beasiswaa->namaperusahaan}}</p>
            <p style="color: red; margin: 5px 0;">Batas Waktu: {{$beasiswaa->batasbeasiswa}}</p>
        </div>
    </div>
</div>
        <!-- Mini Persyaratan -->
        <div class="flex justify-left space-x-4 mb-8 pl-16">
            @foreach($beasiswaa->minipersyaratan as $key => $minipersyaratan)
                <div class="bg-white p-2 rounded-lg shadow-md text-center w-56 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <p class="font-bold text-lg mb-3 text-black pt-2">
                        {{$minipersyaratan}}
                    </p>
                    

                    @if(isset($beasiswaa->miniisi[$key]))
                        @if(is_array($beasiswaa->miniisi[$key]))
                            <div class="flex space-x-4 mt-3">
                                @foreach($beasiswaa->miniisi[$key] as $miniisi)
                                    <div class="p-4 rounded-md text-center" >
                                        <p class="text-gray-600 text-base ">
                                            {{$miniisi}}
                                        </p>
                                        
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-4 rounded-md text-center">
                                <p class="text-gray-600 text-base">
                                    {{$beasiswaa->miniisi[$key]}}
                                </p>
                            </div>
                        @endif
                    @else
                        <p class="text-gray-400 mt-2 text-sm">
                            No miniisi available.
                        </p>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Persyaratan -->
        
        <div class="requirements mt-5 pl-16">
            <h4 class="font-bold text-xl">{{$beasiswaa->persyaratan}}</h4>
            <br>
            <ul class="list-disc ml-4"> <!-- Menggunakan margin kiri -->
                {!! $beasiswaa->isipersyaratan !!}
            </ul>
        </div>
        <br>
        <!-- Bidang Benefit -->
        <div class="benefits mt-4 pl-16">
            <h4 class="font-bold text-xl">{{$beasiswaa->judul_benefit}}</h4>
            <br>
            <div class="flex justify-left space-x-4 mb-8">
                @foreach($beasiswaa->bidang_benefit as $key => $bidang_benefit)
                <div class="bg-white p-2 rounded-lg shadow-md text-center w-72 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <p class="font-bold text-lg text-black mb-3 pt-3">
                        {{$bidang_benefit}}
                    </p>

                    @if(isset($beasiswaa->isi_benefit[$key]))
                        @if(is_array($beasiswaa->isi_benefit[$key]))
                            <div class="flex space-x-4 mt-3">
                                @foreach($beasiswaa->isi_benefit[$key] as $isi_benefit)
                                    <div class="p-4 rounded-md text-center">
                                        <p class="text-gray-600 text-base">
                                            {{$isi_benefit}}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-4 rounded-md text-center">
                                <p class="text-gray-600 text-base">
                                    {{$beasiswaa->isi_benefit[$key]}}
                                </p>
                            </div>
                        @endif
                    @else
                        <p class="text-gray-400 mt-2 text-sm">
                            No isi_benefit available.
                        </p>
                    @endif 
                </div>
                @endforeach
            </div>
        </div>
        <br><br>
        <div class="flex justify-center items-center mt-8"> <!-- Menggunakan Flexbox untuk menempatkan di tengah -->
            <a href="#" class="daftar" data-bs-toggle="modal" data-bs-target="#daftarModal">DAFTAR</a>
        </div>
    @else
        <p>Belum ada beasiswa terbaru.</p>
    @endif
</div>
<!-- Modal -->
<div class="modal fade" id="daftarModal" tabindex="-1" aria-labelledby="daftarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarModalLabel">Form Pendaftaran Beasiswa {{$beasiswaa->namabeasiswa}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('beasiswaa.store') }}" method="POST" id="registrationForm" enctype="multipart/form-data">
                    @csrf  
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" name="namalengkap" id="namalengkap" required>
                        @error('namalengkap')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required>
                        @error('email')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" required>
                        @error('no_telp')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="files" class="form-label">Upload File</ ```html
                        <input type="file" class="form-control @error('files') is-invalid @enderror" name="files[]" id="files" multiple required>
                        @error('files')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                        <small class="form-text text-muted">Maksimum 2MB per file.</small>
                        <small class="form-text text-muted">Jika lebih dari 1 file, maka pengguna hanya bisa menambahkan sekaligus dalam 1x pemilihan.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="submitButton">Kirim</button>
            </div>
        </div>
    </div>
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
<script>
    // Event listener untuk tombol submit di luar form
    document.getElementById('submitButton').addEventListener('click', function() {
        document.getElementById('registrationForm').submit();
    });
</script>
</body>
</html>