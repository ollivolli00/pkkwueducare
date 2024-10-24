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
            background-color: #f8f9fa;
            height: 100vh;
            padding: 20px;
            border-right: 1px solid #ddd;
        }

        .sidebar .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .sidebar .profile h5 {
            margin: 10px 0 5px;
        }

        .sidebar .profile p {
            margin: 0;
            color: #6c757d;
        }

        .sidebar .nav-link {
            color: #000;
            font-weight: bold;
            margin: 10px 0;
        }

        .sidebar .nav-link.active {
            background-color: #6c757d;
            color: #fff;
            border-radius: 5px;
        }

        .content {
            padding: 50px; 
            flex-grow: 1;
        }

        .file-item {
            text-align: center;
            margin-bottom: 20px;
        }

        .file-item img {
            width: 100px;
            height: 170px;
        }

        .file-item p {
            margin: 10px 0 0;
        }

        .btn-back {
            background-color: #bebebea4;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 30px;
        }

        /* Mengatur posisi tombol back */
        .btn-container {
            text-align: right; /* Mengatur posisi tombol ke kanan tapi tidak terlalu mepet */
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

        </ul>
        </nav>
</div>         -->
</div>
        </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
        

    <!-- Header Section End -->

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <img src="#" alt="Profile Picture">
                <h5>Nama Perusahaan</h5>
                <p>perusahaan@gmail.com</p>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href={{'dashboard'}}>
                    <i class="fas fa-upload"></i> Upload
                </a>
                <a class="nav-link" href={{'uplist'}}>
                    <i class="fas fa-list"></i> Uploaded List
                </a>
                <a class="nav-link active" href={{'applist-1'}}>
                    <i class="fas fa-users"></i> Applicants List
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
            </nav>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="row">
                <div class="col-md-3 file-item">
                    <img src="img/gmbr.png" alt="PNG file icon">
                    <p>KK.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="img/gmbr.png" alt="PNG file icon">
                    <p>KTP.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="img/gmbr.png" alt="PNG file icon">
                    <p>rapor.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="img/gmbr.png" alt="PNG file icon">
                    <p>rapor(2).png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="img/gmbr.png" alt="PNG file icon">
                    <p>rapor(3).png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="img/gmbr.png" alt="PNG file icon">
                    <p>pasfoto.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="img/gmbr.png" alt="PNG file icon">
                    <p>akte.png</p>
                </div>
            </div>
            
            <!-- Wrapper untuk tombol Back -->
            <div class="btn-container">
                <button class="btn-back">Back</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
             <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pZg1SIos8VTfR4HZTF0FbTfneFnIz0RoU09NcCd43jkhKexiWrnS1KuD+Jz1QoRp" crossorigin="anonymous"></script>
</body>
</html>
