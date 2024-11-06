<html>
 <head>
  <title>
   Educare - {{$beasiswa->namabeasiswa}}
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
<style>
    .sidebar {
    width: 250px; /* Lebar sidebar */
    background-color: #f8f9fa; /* Warna latar belakang sidebar */
    height: 100vh; /* Tinggi sidebar */
    position: fixed; /* Posisi tetap */
    border-right: 1px solid #dee2e6; /* Garis pemisah */
    display: flex;
    flex-direction: column; /* Mengatur elemen sidebar secara vertikal */
    justify-content: space-between; /* Mengatur jarak antara elemen */
}

.sidebar .profile {
    text-align: center; /* Pusatkan teks */
    padding: 20px; /* Jarak dalam profile */
}

.sidebar .profile img {
    width: 80px; /* Lebar gambar profile */
    height: 80px; /* Tinggi gambar profile */
    border-radius: 50%; /* Membuat gambar menjadi bulat */
}

.sidebar .profile h5 {
    margin-top: 10px; /* Jarak atas judul */
    font-size: 16px; /* Ukuran font judul */
}

.sidebar .profile p {
    font-size: 14px; /* Ukuran font untuk email */
    color: #6c757d; /* Warna font untuk email */
}

.sidebar .nav-link {
    font-size: 16px; /* Ukuran font untuk link */
    color: #000; /* Warna font untuk link */
    padding: 15px 20px; /* Jarak dalam link */
    text-decoration: none; /* Menghilangkan garis bawah */
    display: flex; /* Mengatur link menjadi flex */
    align-items: center; /* Memusatkan elemen di dalam link */
}

.sidebar .nav-link:hover {
    background-color: #e9ecef; /* Warna latar belakang saat hover */
}

.sidebar .nav-link.active {
    background-color: #adb5bd; /* Warna latar belakang untuk link aktif */
    color: #fff; /* Warna font untuk link aktif */
}
.button-style {
    background-color: #38a169; /* Warna hijau (bg-green-500) */
    color: white; /* Teks berwarna putih (text-white) */
    padding: 0.5rem 2rem; /* Padding vertikal 0.5rem dan horizontal 2rem (py-2 dan px-8) */
    border-radius: 0.375rem; /* Sudut dibulatkan (rounded-md) */
    margin-left: 0.5rem; /* Margin kiri 0.5rem (mx-2) */
    margin-right: 0.5rem; /* Margin kanan 0.5rem (mx-2) */
    display: inline-block; /* Agar elemen bisa memiliki margin horizontal */
}
.buttonn-style {
    background-color: #2563eb;
    color: white; /* Teks berwarna putih (text-white) */
    padding: 0.5rem 2rem; /* Padding vertikal 0.5rem dan horizontal 2rem (py-2 dan px-8) */
    border-radius: 0.375rem; /* Sudut dibulatkan (rounded-md) */
    margin-left: 0.5rem; /* Margin kiri 0.5rem (mx-2) */
    margin-right: 0.5rem; /* Margin kanan 0.5rem (mx-2) */
    display: inline-block; /* Agar elemen bisa memiliki margin horizontal */
}
.button-stylee {
    background-color: red; 
    color: white; /* Teks berwarna putih (text-white) */
    padding: 0.5rem 2rem; /* Padding vertikal 0.5rem dan horizontal 2rem (py-2 dan px-8) */
    border-radius: 0.375rem; /* Sudut dibulatkan (rounded-md) */
    margin-left: 0.5rem; /* Margin kiri 0.5rem (mx-2) */
    margin-right: 0.5rem; /* Margin kanan 0.5rem (mx-2) */
    display: inline-block; /* Agar elemen bisa memiliki margin horizontal */
}
</style> 
</head>
 <body class="bg-gray-100 font-sans">
  <div class="flex">
  <div class="w-1/5 bg-white h-scrfulleen shadow-lg">
            <div class="flex flex-col items-center py-8">
                <img alt="Educare Logo" class="mb-4" height="50" src="https://storage.googleapis.com/a1aa/image/TstEQNtfdBxbFCt6fLkuAApv2BtYFfAfQI81qt1YUr7M2G5OB.jpg" width="50"/>
                <h1 class="text-blue-600 text-xl font-bold">EDUCARE</h1>
            </div>
            <div class="flex flex-col items-center mt-8">
                <img alt="User  Avatar" class="rounded-full mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/TsPTHHQA9PLmIZY2P9D0HASO0e0SXKHpfutawnKUyYyYKRnTA.jpg" width="100"/>
                @auth('perusahaan')
    <span class="font-semibold">
        {{ Auth::guard('perusahaan')->user()->namaperusahaan }}
    </span>
    <span class="text-gray-500">
        {{ Auth::guard('perusahaan')->user()->emailperusahaan ?? 'Email Perusahaan Tidak Tersedia' }}
    </span>
@endauth
            </div>
            <div class="mt-8">
                <ul class="space-y-4">
                    <li class="flex items-center justify-center text-gray-800 hover:text-blue-600 cursor-pointer">
                        <a class="nav-link" href="{{ 'dashboard' }}">
                            <i class="fas fa-upload mr-2"></i> Upload
                        </a>
                    </li>
                    <li class="flex items-center justify-center text-white bg-gray-400 hover:bg-gray-500 cursor-pointer py-2">
                        <a class="nav-link active" href="{{ 'uplist' }}">
                            <i class="fas fa-list mr-2"></i> Uploaded List
                        </a>
                    </li>
                    <li class="flex items-center justify-center text-gray-800 hover:text-blue-600 cursor-pointer">
                        <a class="nav-link" href="{{ 'applist-1' }}">
                            <i class="fas fa-users mr-2"></i> Applicants List
                        </a>
                    </li>
                    <li class="flex items-center justify-center text-gray-800 hover:text-blue-600 cursor-pointer">
                    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center w-full py-4 px-6">
            <i class="fas fa-sign-out-alt mr-2"></i>
            <span>Log Out</span>
        </button>
    </form>
                    </li>
                </ul>
            </div>
        </div>

   <!-- Main Content -->
   <div class="w-5/6 p-8">
   <div class="flex justify-end">
   <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('beasiswa.destroy', $beasiswa->id) }}" method="POST">
   <a href="" class="buttonn-style">Publikasikan</a>                                        
   <a href="{{ route('beasiswa.edit', $beasiswa->id) }}" class="button-style">Edit</a>
                                            <form action="{{ route('beasiswa.destroy', $beasiswa->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button-stylee">Hapus</button>
                                            </form>
                                        </form>
                                       
                                    </div>

 
    <br>
    @if($beasiswa)
    <div class="flex justify-center mb-8">
    <img src="{{ asset('storage/images/' . $beasiswa->image1) }}" alt="{{$beasiswa->namabeasiswa}} " class="w-full h-40 object-cover"/>
       </div>
    <div class="flex items-center mb-8">
    <img src="{{ asset('storage/images/' . $beasiswa->image2) }}" alt="{{$beasiswa->namabeasiswa}} " class="mr-4" height="150" width="150"/>     <div>
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
    <div class="flex justify-left space-x-4 mb-8">
     <div class="bg-white p-4 rounded-lg shadow-md text-center">
      <p class="text-gray-600">
      {{$beasiswa->minipersyaratan}}
      </p>
      <p class="font-bold">
      {{$beasiswa->miniisi}}
      </p>
     </div>
    </div>
    <div class="mb-8">
     <h3 class="text-xl font-bold mb-4">
     {{$beasiswa->persyaratan}}
     </h3>
     <p class="list-disc list-inside text-gray-700">
     {{$beasiswa->isipersyaratan}}</p>
    </div>
    <div class="mb-8">
     <h3 class="text-xl font-bold mb-4">
     {{$beasiswa->judul_benefit}}
     </h3>
     <br>
     <div class="flex justify-left space-x-4">
    <div class="bg-white p-4 rounded-lg shadow-md text-center min-h-[300px] w-64 flex flex-col items-center justify-center"> <!-- Menggunakan Flexbox -->
    <img src="{{ asset('storage/images/' . $beasiswa->image3) }}" alt="{{$beasiswa->namabeasiswa}} " class="mb-4" height="100" width="100"/>
     <br>
        <p class="text-gray-600">
        {{$beasiswa->isi_benefit}}
        </p>
    </div>
</div>
@else
    <p>Tidak ada detail beasiswa yang ditampilkan.</p>
@endif
    </div>
    <div class="flex justify-center">
     <div class="bg-blue-200 text-white px-8 py-2 rounded-full">
      DAFTAR
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
