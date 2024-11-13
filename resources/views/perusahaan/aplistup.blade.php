<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Educare - {{$beasiswa->namabeasiswa}}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    ul {
  list-style-type: disc !important; /* Menampilkan bullets */
  padding-left: 20px; /* Jarak di kiri */
}

li {
  margin-bottom: 5px;
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
               @auth('perusahaan')
            <h3 class="font-semibold text-gray-800 mb-1">
              {{ Auth::guard('perusahaan')->user()->namaperusahaan }}
            </h3>
            <p class="text-sm text-gray-500">
              {{ Auth::guard('perusahaan')->user()->email ?? 'Email Perusahaan Tidak Tersedia' }}
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

   <!-- Main Content -->
   <div class="w-5/6 p-8 ml-64">
   <div class="flex justify-end">
    <form id="publishForm" onsubmit="return confirm('Apakah Anda yakin ingin mempublikasikan beasiswa ini?');" action="{{ route('beasiswa.publish', $beasiswa->id) }}" method="POST" style="{{ $beasiswa->is_published ? 'display: none;' : '' }}">
        @csrf
        <button type="submit" id="publishButton" class="buttonn-style">Publikasikan</button>
    </form>
    <form id="unpublishForm" onsubmit="return confirm('Apakah Anda yakin ingin meng-unpublish beasiswa ini?');" action="{{ route('beasiswa.unpublish', $beasiswa->id) }}" method="POST" style="{{ $beasiswa->is_published ? 'display: inline-block;' : 'display: none;' }}">
        @csrf
        <button type="submit" id="unpublishButton" class="button-stylee">Unpublish</button>
    </form>
    <a href="{{ route('beasiswa.edit', $beasiswa->id) }}" class="button-style">Edit</a>
    <form action="{{ route('beasiswa.destroy', $beasiswa->id) }}" method="POST" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="button-stylee">Hapus</button>
    </form>
</div>
    <br>
    @if($beasiswa)
    <div class="flex justify-center mb-8">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-screen-lg">
        <!-- Gambar pertama -->
        <img src="{{ asset('storage/images/' . $beasiswa->image1) }}" alt="{{$beasiswa->namabeasiswa}}" class="w-full h-auto md:h-[200px] object-cover rounded-lg mb-4"/>

        <!-- Bagian teks dan gambar kedua -->
        <div class="flex items-center mb-4 pl-4">
            <img src="{{ asset('storage/images/' . $beasiswa->image2) }}" alt="{{$beasiswa->namabeasiswa}}" class="mr-4" height="150" width="150"/>
            <div class="pl-4">
                <h2 class="text-2xl font-bold">
                    {{$beasiswa->namabeasiswa}}
                </h2>
                <p class="text-gray-600">
                    {{$beasiswa->namaperusahaan}}
                </p>
                <p class="text-gray-500">
                    {{$beasiswa->batasbeasiswa}}
                </p>
            </div>
        </div>

        <!-- Mini Persyaratan -->
        <div class="flex justify-left space-x-4 mb-8 pl-6">
            @foreach($beasiswa->minipersyaratan as $key => $minipersyaratan)
                <div class="bg-white p-5 rounded-lg shadow-md text-center w-56 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <p class="font-bold text-lg mb-3">
                        {{$minipersyaratan}}
                    </p>

                    <!-- Memeriksa apakah miniisi ada dan berupa array -->
                    @if(isset($beasiswa->miniisi[$key]))
                        @if(is_array($beasiswa->miniisi[$key]))
                            <div class="flex space-x-4 mt-3">
                                @foreach($beasiswa->miniisi[$key] as $miniisi)
                                    <div class="p-4 rounded-md w-48">
                                        <p class="text-gray-600 text-base">
                                            {{$miniisi}}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-4 rounded-md w-48">
                                <p class="text-gray-600 text-base">
                                    {{$beasiswa->miniisi[$key]}}
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
        <div class="mb-8 pl-8">
            <h3 class="text-xl font-bold mb-4">
                {{$beasiswa->persyaratan}}
            </h3>
            <div class="text-gray-700">
                <ul class="list-disc pl-6">
                    {!! $beasiswa->isipersyaratan !!}
                </ul>
            </div>
        </div>

        <!-- Benefit -->
        <div class="mb-8 pl-8">
            <h3 class="text-xl font-bold mb-4">
                {{$beasiswa->judul_benefit}}
            </h3>
            <br>
             <!-- Mini Persyaratan -->
        <div class="flex justify-left space-x-4 mb-8">
            @foreach($beasiswa->bidang_benefit as $key => $bidang_benefit)
                <div class="bg-white p-5 rounded-lg shadow-md text-center w-56 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <p class="font-bold text-lg mb-3">
                        {{$bidang_benefit}}
                    </p>

                    <!-- Memeriksa apakah miniisi ada dan berupa array -->
                    @if(isset($beasiswa->isi_benefit[$key]))
                        @if(is_array($beasiswa->isi_benefit[$key]))
                            <div class="flex space-x-4 mt-3">
                                @foreach($beasiswa->isi_benefit[$key] as $isi_benefit)
                                    <div class="p-4 rounded-md w-48">
                                        <p class="text-gray-600 text-base">
                                            {{$isi_benefit}}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-4 rounded-md w-48">
                                <p class="text-gray-600 text-base">
                                    {{$beasiswa->isi_benefit[$key]}}
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
        
        @else
    <p>Tidak ada detail beasiswa yang ditampilkan.</p>
@endif
<div class="flex justify-center">
     <div class="bg-blue-200 text-white px-8 py-2 rounded-full">
      DAFTAR
     </div>
    </div>
    </div>
</div>

 
   </div>
  </div>
    <script>
         document.getElementById('publishForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form
        // Ganti tombol Publikasikan dengan Unpublish
        document.getElementById('publishButton').style.display = 'none';
        document.getElementById('unpublishForm').style.display = 'inline-block';
        // Kirim form untuk mempublikasikan
        this.submit();
    });

    document.getElementById('unpublishForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form
        // Ganti tombol Unpublish dengan Publikasikan
        document.getElementById('unpublishButton').style.display = 'none';
        document.getElementById('publishForm').style.display = 'inline-block';
        // Kirim form untuk meng-unpublish
        this.submit();
    });

    </script>
 </body>
</html>
