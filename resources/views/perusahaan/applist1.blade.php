
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Educare </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  
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
    <div class="d-flex">
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
          @auth('perusahaan')
            <h3 class="font-semibold text-gray-800 mb-1">
              {{ Auth::guard('perusahaan')->user()->namaperusahaan }}
            </h3>
            <p class="text-sm text-gray-500">
              {{ Auth::guard('perusahaan')->user()->emailperusahaan ?? 'Email Perusahaan Tidak Tersedia' }}
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
