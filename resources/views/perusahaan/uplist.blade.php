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
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .profile {
            text-align: center;
            padding: 20px;
        }
        .sidebar .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .sidebar .profile h5 {
            margin-top: 10px;
            font-size: 16px;
        }
        .sidebar .profile p {
            font-size: 14px;
            color: #6c757d;
        }
        .sidebar .nav-link {
            font-size: 16px;
            color: #000;
            padding: 15px 20px;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }
        .sidebar .nav-link.active {
            background-color: #adb5bd;
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 50px;
        }
        .card {
            border-radius: 15px;
            padding: 20px;
            margin: 10px;
        }
        .card img {
            height: auto;
        }
        .card h4 {
            font-size: 20px;
            font-weight: bold;
            margin: 0; /* Removed margin to align text properly */
        }
        .card p {
            font-size: 14px;
            color: #6c757d;
        }
        .card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card a {
            background-color: #bebebea4;
            border: none;
            padding: 6px 40px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none; /* Menghilangkan garis bawah */
            color: black; /* Warna teks */
            align-self: flex-start; /* Align button to the left */
        }
        .card a:hover {
            background-color: #adb5bd; /* Warna latar belakang saat hover */
            color: white; /* Warna teks saat hover */
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
                <!-- <div class="col-lg-6">
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

        </ul> -->
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

    <div class="sidebar">
        <div>
            <div class="profile">
                <img src="https://storage.googleapis.com/a1aa/image/TsPTHHQA9PLmIZY2P9D0HASO0e0SXKHpfutawnKUyYyYKRnTA.jpg" alt="Profile Picture" width="80" height="80"/>
                <h5>Nama Perusahaan</h5>
                <p>perusahaan@gmail.com</p>
            </div>
            <a class="nav-link" href={{'dashboard'}}><i class="fas fa-upload"></i> Upload</a>
            <a class="nav-link active" href={{'uplist'}}><i class="fas fa-list"></i> Uploaded List</a>
            <a class="nav-link" href={{'applist-1'}}><i class="fas fa-users"></i> Applicants List</a>
        </div>
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="d-flex align-items-center">
                        <img src="img/bcakcil.png" alt="BCA Logo" width="135" height="135"/>
                        <div class="ms-4 card-body">
                            <h4>Beasiswa S1</h4>
                            <p>by Bank BCA</p>
                            <a href="">VIEW</a> <!-- Tautan ditambahkan di sini -->
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="d-flex align-items-center">
                        <img src="img/bcakcil.png" alt="BCA Logo" width="135" height="135"/>
                        <div class="ms-4 card-body">
                            <h4>Beasiswa S3</h4>
                            <p>by Bank BCA</p>
                            <a href="">VIEW</a> <!-- Tautan ditambahkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="d-flex align-items-center">
                        <img src="img/bcakcil.png" alt="BCA Logo" width="135" height="135"/>
                        <div class="ms-4 card-body">
                            <h4>Beasiswa S2</h4>
                            <p>by Bank BCA</p>
                            <a href="">VIEW</a> <!-- Tautan ditambahkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
