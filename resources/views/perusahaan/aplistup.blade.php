<html>
 <head>
  <title>
   Educare - BCA Beasiswa S3
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
    <div class="flex justify-center mb-8">
     <img alt="Header Image" class="w-full h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/8AqxOeN50lwebEczm8d6mmrPd174tUwZUevvosOTDFSBbjcnA.jpg"/>
    </div>
    <div class="flex items-center mb-8">
     <img alt="BCA Logo" class="mr-4" height="50" src="https://storage.googleapis.com/a1aa/image/8AqxOeN50lwebEczm8d6mmrPd174tUwZUevvosOTDFSBbjcnA.jpg" width="50"/>
     <div>
      <h2 class="text-2xl font-bold">
       Beasiswa S3
      </h2>
      <p class="text-gray-600">
       by Bank BCA
      </p>
      <p class="text-gray-500">
       Batas Waktu: 14/09/2024
      </p>
     </div>
    </div>
    <div class="flex justify-center space-x-4 mb-8">
     <div class="bg-white p-4 rounded-lg shadow-md text-center">
      <p class="text-gray-600">
       Pendidikan
      </p>
      <p class="font-bold">
       Minimal pendidikan S3/Sederajat
      </p>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-md text-center">
      <p class="text-gray-600">
       Usia
      </p>
      <p class="font-bold">
       Maksimal 30 tahun
      </p>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-md text-center">
      <p class="text-gray-600">
       Periode Program
      </p>
      <p class="font-bold">
       2.5 Tahun
      </p>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-md text-center">
      <p class="text-gray-600">
       Program Pendidikan
      </p>
      <p class="font-bold">
       Banking dan Perbankan &amp; Teknik Informatika
      </p>
     </div>
    </div>
    <div class="mb-8">
     <h3 class="text-xl font-bold mb-4">
      Persyaratan
     </h3>
     <ul class="list-disc list-inside text-gray-700">
      <li>
       Warga negara Indonesia
      </li>
      <li>
       Siswa/siswi kelas X / lulusn SMA/SMK
      </li>
      <li>
       Rata-rata nilai rapor kelas X, XI, dan XII minimal 7.50
      </li>
      <li>
       Rata-rata nilai Matematika kelas X, XI, dan XII (IPA, IPS) atau nilai Produktif kelas X, XI, dan XII khusus SMK minimal 7.50
      </li>
      <li>
       Silakan mengisi angka 0.00 pada kolom nilai rapor kelas XI semester 2 (jika nilai rapor belum keluar)
      </li>
      <li>
       Tidak pernah tinggal kelas dari SD-SMA/SMK
      </li>
      <li>
       Tidak pernah terlibat narkoba dan pelanggaran hukum lainnya
      </li>
      <li>
       Lulus dalam proses seleksi (Seleksi Administrasi, Tes Online, Tes Psikologi, Wawancara I, Wawancara II &amp; Tes Kesehatan)
      </li>
     </ul>
    </div>
    <div class="flex justify-center space-x-4 mb-8">
     <div class="bg-white p-4 rounded-lg shadow-md text-center">
      <p class="text-gray-600">
       Lokasi
      </p>
      <p class="font-bold">
       Berterakreditasi A
      </p>
      <p class="text-gray-600">
       Bogor
      </p>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-md text-center">
      <p class="text-gray-600">
       Jam Belajar
      </p>
      <p class="font-bold">
       Senin - Jumat
      </p>
      <p class="text-gray-600">
       08:00 - 17:00 WIB
      </p>
     </div>
    </div>
    <div class="mb-8">
     <h3 class="text-xl font-bold mb-4">
      Benefit Yang Didapat Melalui Beasiswa BCA
     </h3>
     <div class="flex justify-center space-x-4">
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
       <img alt="Benefit 1" class="mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/QHbIvdiTuc5hL1owJeTB8RfEZHI4NqDiaAj36nFp9PJntRuTA.jpg" width="100"/>
       <p class="text-gray-600">
        Disediakan buku pelajaran dan penunjang lainnya serta fasilitas laptop (khusus angkatan PPTI)
       </p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
       <img alt="Benefit 2" class="mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/Q00aqrCSkha5AJZ6pLJjxvP00Vp5f0S9ce7sONFP6mBfajcnA.jpg" width="100"/>
       <p class="text-gray-600">
        Bebas biaya pendidikan dan mendapatkan uang saku bulanan
       </p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
       <img alt="Benefit 3" class="mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/R8gu4dwdxYbHBhS7sRjg8sTv6nQJetEezIk8A1kViLdltRuTA.jpg" width="100"/>
       <p class="text-gray-600">
        Mendapatkan kesempatan magang dan penawaran kerja di BCA
       </p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
       <img alt="Benefit 4" class="mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/RfrMHvYVFnVjN6pj6epweuf3KFBFNtMS2xedM28e6hwnYbk7E.jpg" width="100"/>
       <p class="text-gray-600">
        Dormitory, shuttle bus, dan makan siang
       </p>
      </div>
     </div>
    </div>
    <div class="flex justify-center">
     <button class="bg-blue-600 text-white px-8 py-2 rounded-full">
      DAFTAR
     </button>
    </div>
   </div>
  </div>
 </body>
</html>
