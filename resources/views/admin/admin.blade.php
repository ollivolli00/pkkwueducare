<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
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
  </style> 
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex">
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
         
            <h3 class="font-semibold text-gray-800 mb-1">
            Admin
            </h3>
            <p class="text-sm text-gray-500">
            admin@educare.com
            </p>
 
        </div>

               <!-- Navigation Links -->
               <nav class="flex-grow py-4">
        <a class="nav-link {{ Request::routeIs('admin') ? 'active' : '' }}" 
               href="{{ route('admin') }}">
                <i class="fas fa-home w-6"></i>
                <span>Dashboard</span>
            </a>   
          <a class="nav-link {{ Request::routeIs('datauser') ? 'active' : '' }}" 
             href="{{ route('datauser') }}">
            <i class="fas fa-user w-6"></i>
            <span>Data Users</span>
          </a>
          <a class="nav-link {{ Request::routeIs('dataperusahaan') ? 'active' : '' }}" 
             href="{{ route('dataperusahaan') }}">
            <i class="fas fa-user w-6"></i>
            <span>Data Perusahaan</span>
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

    <div class="ml-64 p-6 bg-gray-100 min-h-screen">
  <!-- Page Header -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold text-gray-800">Dashboard Admin</h1>
  </div>
<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
  <!-- Card 1 -->
  <div class="bg-white p-6 rounded-lg shadow">
    <div class="flex items-center">
      <i class="fas fa-users text-blue-500 text-2xl mr-3"></i>
      <div>
        <h3 class="text-lg font-semibold text-gray-700">Total Data User</h3>
        <p class="text-2xl font-bold">{{ $totalUsers }}</p>
      </div>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="bg-white p-6 rounded-lg shadow">
    <div class="flex items-center">
      <i class="fas fa-upload text-green-500 text-2xl mr-3"></i>
      <div>
        <h3 class="text-lg font-semibold text-gray-700">Total Data Perusahaan</h3>
        <p class="text-2xl font-bold">{{ $totalPerusahaan }}</p>
      </div>
    </div>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Uploaded Beasiswa Section -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Recent Uploaded Beasiswa</h2>
        <ul>
            @if ($recentBeasiswa->isEmpty())
                <li class="py-3 text-gray-500">Tidak ada beasiswa baru dalam 24 jam terakhir.</li>
            @else
                @foreach ($recentBeasiswa as $beasiswa)
                    <li class="flex items-center justify-between py-3 border-b border-gray-200">
                        <p class="text-gray-700">
                            <strong>{{ $beasiswa->namabeasiswa }}</strong> - 
                            <span class="text-gray-600">
                                Diterbitkan oleh 
                                @if($beasiswa->perusahaan)
                                    {{ $beasiswa->perusahaan->namaperusahaan }}
                                @else
                                    Perusahaan tidak tersedia
                                @endif
                            </span> 
                        </p>
                        <span class="text-gray-500 text-sm ml-4">{{ $beasiswa->created_at->diffForHumans() }}</span>
                    </li>
                @endforeach
            @endif
        </ul>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $recentBeasiswa->links() }}
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Recent Activity</h2>
    <ul>
        @if ($recentApplicants->isEmpty())
            <li class="py-3 text-gray-500">Tidak ada aktivitas baru dalam 24 jam terakhir.</li>
        @else
            @foreach ($recentApplicants as $applicant)
                <li class="flex items-center justify-between py-3 border-b border-gray-200">
                    <p class="text-gray-700">
                        @if($applicant->pengguna) 
                            <strong>{{ $applicant->pengguna->namalengkap }}</strong> - 
                            <span class="text-gray-600">
                                @if($applicant->beasiswa)
                                    Applied for Scholarship: {{ $applicant->beasiswa->namabeasiswa }} by 
                                    @if($applicant->beasiswa->perusahaan)
                                        {{$applicant->beasiswa->perusahaan->namaperusahaan}}
                                    @else
                                        Perusahaan tidak tersedia
                                    @endif
                                @else
                                    Beasiswa tidak tersedia
                                @endif
                            </span>
                        @else
                            Pengguna tidak tersedia
                        @endif
                    </p>
                    <span class="text-gray-500 text-sm ml-4">{{ $applicant->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        @endif
    </ul>

    <div class="mt-4">
        <!-- Pagination links -->
        {{ $recentApplicants->links() }}
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
