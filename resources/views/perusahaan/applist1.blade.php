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

        /* Sidebar styling */
        .sidebar {
            background-color: #f0f0f0;
            height: 100vh;
            padding: 20px;
            width: 250px;
            position: fixed;
        }

        .sidebar .nav-link {
            color: black;
            font-size: 18px;
            margin: 10px 0;
        }

        .sidebar .nav-link.active {
            background-color: #d3d3d3;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .profile h5 {
            margin-top: 10px;
            font-size: 18px;
        }

        .profile p {
            font-size: 14px;
            color: gray;
        }

        /* Table container */
        .table-container {
            padding: 50px;
            flex-grow: 1;
            margin-left: 250px;
        }

        /* Table styling */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #e0e0e0;
        }

        .table td img {
            width: 40px;
            height: 40px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: right;
            margin-top: 30px;
        }

        .pagination .btn {
            margin: 0 5px;
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
                <img src="https://placehold.co/100x100" alt="Profile Picture">
                @auth('perusahaan')
    <span class="font-semibold">
        {{ Auth::guard('perusahaan')->user()->namaperusahaan }}
    </span>
    <span class="text-gray-500">
        {{ Auth::guard('perusahaan')->user()->emailperusahaan ?? 'Email Perusahaan Tidak Tersedia' }}
    </span>
@endauth
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href={{'dashboard'}}><i class="fas fa-upload"></i> Upload</a>
                <a class="nav-link" href={{'uplist'}}><i class="fas fa-list"></i> Uploaded List</a>
                <a class="nav-link active" href={{'applist-1'}}><i class="fas fa-users"></i> Applicants List</a>
                <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link">
            <i class="fas fa-sign-out-alt mr-2"></i>
            <span>Log Out</span>
        </button>
    </form>
            
            </nav>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Uploaded File</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Regina Olivia</td>
                        <td><a href="mailto:reginaa@gmail.com">reginaa@gmail.com</a></td>
                        <td>08119540957</td>
                        <td>
                            <img src="img/gmbr.png" alt="File Icon">
                            <img src="img/gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Selly Regita</td>
                        <td><a href="mailto:rereee@gmail.com">rereee@gmail.com</a></td>
                        <td>08133359018</td>
                        <td>
                            <img src="img/gmbr.png" alt="File Icon">
                            <img src="img/gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jasmine Novandrea</td>
                        <td><a href="mailto:navaa@gmail.com">navaa@gmail.com</a></td>
                        <td>081249590572</td>
                        <td>
                            <img src="img/gmbr.png" alt="File Icon">
                            <img src="img/gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Lydia Wulan</td>
                        <td><a href="mailto:liddiaa@gmail.com">liddiaa@gmail.com</a></td>
                        <td>083110601563</td>
                        <td>
                            <img src="img/gmbr.png" alt="File Icon">
                            <img src="img/gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Verda Edgina</td>
                        <td><a href="mailto:daverda@gmail.com">daverda@gmail.com</a></td>
                        <td>085236593477</td>
                        <td>
                            <img src="img/gmbr.png" alt="File Icon">
                            <img src="img/gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="pagination">
                <button class="btn btn-outline-secondary disabled"><i class="fas fa-arrow-left"></i></button>
                <button class="btn btn-outline-secondary"><i class="fas fa-arrow-right"></i></button>
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
