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
         
          <h3 class="font-semibold text-gray-800 mb-1 text-lg">Admin</h3>
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
          <a class="nav-link {{ Request::routeIs('manage') ? 'active' : '' }}" 
             href="{{route('manage')}}">
            <i class="fas fa-upload w-6"></i>
            <span>Manage Uploads</span>
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

    <!-- Section to Display Logged-In Users Data -->
    <div class="ml-64 p-8">
      <h2 class="text-2xl font-semibold mb-4">Data Akun Perusahaan</h2>
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full leading-normal table-auto">
  <thead>
    <tr>
      <th class="px-6 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Perusahaan</th>
      <th class="px-6 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email Perusahaan</th>
      <th class="px-6 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Beasiswa Diupload</th>
      <th class="px-6 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Dibuat Tanggal</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($perusahaans as $perusahaann)
      <tr class="hover:bg-gray-50">
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $perusahaann->namaperusahaan }}</td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $perusahaann->emailperusahaan }}</td>

        <!-- Menampilkan Beasiswa yang di-upload -->
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
          @foreach ($perusahaann->beasiswas as $beasiswa)
            <ul>
              <li>{{ $beasiswa->nama_beasiswa }}</li>
            </ul>
          @endforeach
        </td>

        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $perusahaann->created_at->format('d-m-Y H:i:s') }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

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
