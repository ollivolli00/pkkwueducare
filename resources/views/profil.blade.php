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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
   </head>
 
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
                <li class="active"><a href="./index.html">Home</a></li>
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
                        <a href="./index.html"><img src="img/logo.png" alt="" width="150px;" height="50px;"></a>
                    </div>
                </div>
                <div class="col-lg-6">
    <nav class="header__menu">
        <ul>

                <li><a href="{{'/'}}" style="text-align:center; ">Home</a></li>   
              <li>  <a href="{{ 'about' }}" style="text-align:center; ">About</a>   </li>          

@guest
    <a href="{{ route('login') }}" style="text-align:center; color:white; padding: 10px 15px 12px; background: #7fad39;">Daftar Sebagai Perusahaan</a>
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
</div>        
</div>
        </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
       
   <body class="bg-gray-100 font-roboto">
  
  <main class="container mx-auto mt-6">
   <div class="bg-white shadow-md rounded-lg p-6">
   <img src="img/bannerr.png" style= "width: 100%; transform: scale(1); border-radius:40px;">
   <br> <br> 
   <div class="section-title" style="font-size: 30px;">
                        <h2 center>LENGKAPI PROFILMU SEKARANG!</h2>
                    </div>   
    <br><br>
    <form>
     <div class="mb-6">
      <label class="block text-gray-700 font-bold mb-2" for="nama">
       Nama Lengkap
      </label>
      <input class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="nama" placeholder="Masukkan Nama Lengkap Anda..." type="text"/>
     </div>
     <div class="mb-6">
      <label class="block text-gray-700 font-bold mb-2" for="tanggal-lahir">
       Tanggal Lahir
      </label>
      <div class="relative">
       <input class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="tanggal-lahir" type="date"/>
      </div>
     </div>
  <div class="mb-6">
  <label class="block text-gray-700 font-bold mb-2" for="jenis_kelamin">
    Jenis Kelamin
  </label>
  <div class="relative">
    <select class="w-full appearance-none px-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700">
      <option value="" disabled selected>Pilih Jenis Kelamin</option>
      <option value="laki-laki">Laki-laki</option>
      <option value="perempuan">Perempuan</option>
</select>
  </div>
</div>


     <div class="mb-6">
      <label class="block text-gray-700 font-bold mb-2" for="email">
       Email
      </label>
      <input class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" placeholder="Masukkan Email Lengkap Anda...." type="email"/>
     </div>
     <div class="mb-6">
      <label class="block text-gray-700 font-bold mb-2" for="telepon">
       No. Telepon
      </label>
      <input class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="telepon" placeholder="Masukkan Nomor Telepon Anda...." type="tel"/>
     </div>
     <div class="mb-6">
      <label class="block text-gray-700 font-bold mb-2" for="file-upload">
       Upload File
      </label>
      <input class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-gray-700 hover:file:bg-gray-300" id="file-upload" type="file"/>
      <p class="text-gray-500 text-sm mt-1">
       Maksimal ukuran file foto : 3MB File extension: png, jpg, jpeg. Foto akan digunakan pada saat mendaftar beasiswa, pilihlah foto yang layak.
      </p>
      <p class="text-gray-500 text-sm">
       (Contoh File : pas foto 3x4, scan KK, scan KTP, scan akte, scan rapor, dll).
      </p>
     </div>
     <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300" type="submit">
      Simpan
     </button>
    </form>
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