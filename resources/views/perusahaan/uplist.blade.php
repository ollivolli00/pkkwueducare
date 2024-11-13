<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <script src="https://cdn.tailwindcss.com"></script>
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

   
</head>
<style>
     .content {
        background-color: #f3f4f6;
        min-height: 100vh;
    }

    /* Hover effect untuk card */
    .bg-white:hover {
        transform: translateY(-2px);
        transition: transform 0.2s ease-in-out;
    }

    /* Image container */
    .w-32 {
        width: 8rem;
        height: 8rem;
    }

    /* Button hover effect */
    .hover\:bg-gray-300:hover {
        background-color: #d1d5db;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .content {
            margin-left: 0;
            padding: 1rem;
        }
        
        .flex {
            flex-direction: column;
        }
        
        .w-32 {
            width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 1rem 1.5rem;
        color: #4a5568; /* Warna teks */
        text-decoration: none; /* Menghilangkan garis bawah */
        transition: background-color 0.2s ease, color 0.2s ease; /* Transisi halus */
    }

    .nav-link:hover {
        background-color: #edf2f7; /* Warna latar belakang saat hover */
        color: #2d3748; /* Warna teks saat hover */
    }

    .nav-link.active {
        background-color: #cbd5e0; /* Warna latar belakang untuk link aktif */
        color: #2b6cb0; /* Warna teks untuk link aktif */
        font-weight: bold; /* Menebalkan teks untuk link aktif */
    }

    .nav-link i {
        margin-right: 0.75rem; /* Jarak antara ikon dan teks */
    }
    .button-style {
      background-color: #38a169;
      color: white;
      padding: 0.5rem 2rem;
      border-radius: 0.375rem;
      margin-left: 0.5rem;
      margin-right: 0.5rem;
      display: inline-block;
    }

    .buttonn-style {
      background-color: #2563eb;
      color: white;
      padding: 0.5rem 2rem;
      border-radius: 0.375rem;
      margin-left: 0.5rem;
      margin-right: 0.5rem;
      display: inline-block;
    }

    .button-stylee {
      background-color: red;
      color: white;
      padding: 0.5rem 2rem;
      border-radius: 0.375rem;
      margin-left: 0.5rem;
      margin-right: 0.5rem;
      display: inline-block;
    }

    .sidebar {
      transition: all 0.3s;
    }

    .nav-link {
      @apply flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100 transition-colors duration-200;
    }

    .nav-link.active {
      @apply bg-blue-50 text-blue-600 font-medium;
    }

    .nav-link i {
      @apply mr-3;
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
    <!-- Sidebar -->
    <div class="sidebar bg-white h-screen w-64 fixed left-0 top-0 overflow-y-auto shadow-lg">
      <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="p-6 border-b border-gray-200">
          <img alt="Educare Logo" src="{{ asset('img/logo.png') }}" class="w-full max-w-[200px] mx-auto" />
        </div>

        <!-- Profile Section -->
        <div class="p-6 border-b border-gray-200 text-center">
          <img src="https://storage.googleapis.com/a1aa/image/TsPTHHQA9PLmIZY2P9D0HASO0e0SXKHpfutawnKUyYyYKRnTA.jpg" 
               alt="Profile Picture" 
               class="w-24 h-24 rounded-full mx-auto mb-4"/>
               @auth
    <h3 class="font-semibold text-gray-800 mb-1">
        {{ Auth::user()->perusahaan->namaperusahaan ?? 'Nama Perusahaan Tidak Tersedia' }}
    </h3>
    <p class="text-sm text-gray-500">
        {{ Auth::user()->perusahaan->email ?? 'Email Perusahaan Tidak Tersedia' }}
    </p>
@endauth

        </div>

        <!-- Navigation Links -->
        <nav class="flex-grow py-4">
        <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" 
               href="{{ route('dashboard') }}">
                <i class="fas fa-home w-6"></i>
                <span>Dashboard</span>
            </a>   
          <a class="nav-link {{ Request::routeIs('beasiswa.create') ? 'active' : '' }}" 
             href="{{ route('beasiswa.create') }}">
            <i class="fas fa-upload w-6"></i>
            <span>Upload</span>
          </a>
          <a class="nav-link {{ Request::routeIs('beasiswa.index') ? 'active' : '' }}" 
             href="{{ route('beasiswa.index') }}">
            <i class="fas fa-list w-6"></i>
            <span>Uploaded List</span>
          </a>
          <a class="nav-link {{ Request::routeIs('applist-1') ? 'active' : '' }}" 
             href="{{route('applist-1')}}">
            <i class="fas fa-users w-6"></i>
            <span>Applicants List</span>
          </a>
        </nav>

        <!-- Logout Button -->
        <div class="p-1 border-t border-gray-200">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link text-red-600 w-full text-left">
              <i class="fas fa-sign-out-alt w-6"></i>
              <span>Log Out</span>
            </button>
          </form>
        </div>
      </div>
    </div>

   
<div class="content ml-64 p-8"> <!-- Menggunakan margin-left dan padding -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> <!-- Grid layout dengan gap -->
        @forelse($beasiswas as $beasiswa)
            <div class="bg-white rounded-lg shadow-md overflow-hidden"> <!-- Card dengan background putih -->
                <div class="p-6">
                    <div class="flex items-start space-x-4"> <!-- Flex container dengan spacing -->
                        <img src="{{ asset('storage/images/' . $beasiswa->image2) }}" 
                             alt="Company Logo" 
                             class="w-32 h-32 object-cover rounded-lg" /> <!-- Image styling -->
                        <div class="flex flex-col flex-grow space-y-3"> <!-- Content container -->
                            <h4 class="font-bold text-lg text-gray-800">
                                {{ $beasiswa->namabeasiswa }}
                            </h4>
                            <p class="text-gray-600">
                                {{ $beasiswa->namaperusahaan }}
                            </p>
                            <br>
                            <a href="{{route('beasiswa.show', $beasiswa->id)}}" 
                               class="inline-flex items-center justify-center px-6 py-2 bg-gray-200 text-gray-800 rounded-full text-sm font-semibold hover:bg-gray-300 transition-colors">
                                VIEW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    Belum ada beasiswa yang tersedia.
                </div>
            </div>
        @endforelse
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
