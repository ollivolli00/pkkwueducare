<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Educare</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <style>
    .nav-link {
        display: flex;
        align-items: center;
        padding: 1rem 1.5rem;
        color: #4a5568;
        text-decoration: none;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .nav-link:hover {
        background-color: #edf2f7;
        color: #2d3748;
    }

    .nav-link.active {
        background-color: #cbd5e0;
        color: #2b6cb0;
        font-weight: bold;
    }

    .nav-link i {
        margin-right: 0.75rem;
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

    .sidebar {
        transition: all 0.3s;
    }

    .table-container {
        padding: 50px;
        flex-grow: 1;
        margin-left: 250px;
    }

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
                <div class="p-6 border-b border-gray-200">
                    <img alt="Educare Logo" src="{{ asset('img/logo.png') }}" class="w-full max-w-[200px] mx-auto" />
                </div>

                <div class="p-6 border-b border-gray-200 text-center">
                    <img src="https://storage.googleapis.com/a1aa/image/TsPTHHQA9PLmIZY2P9D0HASO0e0SXKHpfutawnKUyYyYKRnTA.jpg" 
                         alt="Profile Picture" class="w-24 h-24 rounded-full mx-auto mb-4"/>
                     @auth('perusahaan')
                    <h3 class="font-semibold text-gray-800 mb-1">
                        {{ Auth::guard('perusahaan')->user()->namaperusahaan }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{ Auth::guard('perusahaan')->user()->email ?? 'Email Perusahaan Tidak Tersedia' }}
                    </p>
                    @endauth
                </div>

                <nav class="flex-grow py-4">
                    <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-home w-6"></i>
                        <span>Dashboard</span>
                    </a>   
                    <a class="nav-link {{ Request::routeIs('beasiswa.create') ? 'active' : '' }}" href="{{ route('beasiswa.create') }}">
                        <i class="fas fa-upload w-6"></i>
                        <span>Upload</span>
                    </a>
                    <a class="nav-link {{ Request::routeIs('beasiswa.index') ? 'active' : '' }}" href="{{ route('beasiswa.index') }}">
                        <i class="fas fa-list w-6"></i>
                        <span>Uploaded List</span>
                    </a>
                    <a class="nav-link {{ Request::routeIs('applist-1') ? 'active' : '' }}" href="{{route('applist-1')}}">
                        <i class="fas fa-users w-6"></i>
                        <span>Applicants List</span>
                    </a>
                </nav>

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
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Image</th>
                <th>Uploaded File</th>
                <th>Nama Beasiswa</th> <!-- Kolom Nama Beasiswa -->
            </tr>
        </thead>
        <tbody>
            @if($daftars->count()) <!-- Check if there are any records -->
                @foreach ($daftars as $index => $daftar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $daftar->namalengkap }}</td>
                    <td>{{ $daftar->tanggal_lahir }}</td>
                    <td>{{ $daftar->jenis_kelamin }}</td>
                    <td><a href="mailto:{{ $daftar->email }}">{{ $daftar->email }}</a></td>
                    <td>{{ $daftar->no_telp }}</td>
                    <td>
                        @if($daftar->image)
                            <img src="{{ asset('storage/images/'.$daftar->image) }}" alt="User  Image" style="width: 50px; height: 50px;">
                        @else
                            <span>Tidak Ada</span>
                        @endif
                    </td>
                    <td>
                        @if($daftar->zip_file)
                            <a href="{{ asset('storage/files/' . $daftar->zip_file) }}" class="btn btn-primary" download>
                                Unduh File ZIP
                            </a>
                        @else
                            <p>Tidak ada file ZIP yang tersedia.</p>
                        @endif
                    </td>
                    <td>
                        <!-- Menampilkan nama beasiswa yang didaftar -->
                        @if($daftar->beasiswa)
                            {{ $daftar->beasiswa->namabeasiswa }} <!-- Nama beasiswa -->
                        @else
                            <span>Tidak Ada</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center">Tidak ada pelamar yang ditemukan.</td>
                </tr>
            @endif
        </tbody>
    </table>
       <!-- Pagination -->
            <div class="pagination">
                {{ $daftars->links() }} <!-- Menambahkan pagination otomatis di bawah tabel -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pZg1SIos8VTfR4HZTF0FbTfneZiwDtkOhbxCOWAzZyYWG5y27Wyjo5zFhP3t9X2Y" crossorigin="anonymous"></script>
</body>
</html>
