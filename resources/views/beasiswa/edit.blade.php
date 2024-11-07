<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Educare - {{$beasiswa->namabeasiswa}}</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
  <div class="w-1/5 bg-white h-fullscreen shadow-lg">
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
      <form action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <br>

        <div class="flex justify-center mb-8">
  <!-- Image 1 (Full width) -->
  @if($beasiswa->image1)
    <img src="{{ asset('storage/images/' . $beasiswa->image1) }}" alt="{{$beasiswa->namabeasiswa}}" class="w-full h-40 object-cover rounded"/>
  @endif
</div>

<div class="flex items-start mb-8 space-x-4">
  <!-- Image 2 (Smaller, aligned left) -->
  @if($beasiswa->image2)
  <img src="{{ asset('storage/images/' . $beasiswa->image2) }}" alt="{{$beasiswa->namabeasiswa}} " class="mr-4" height="150" width="150"/> 
  @endif

  <!-- Form fields beside Image 2 -->
  <div class="w-3/4">
    <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('namabeasiswa') is-invalid @enderror" value="{{ old('namabeasiswa', $beasiswa->namabeasiswa) }}"
           name="namabeasiswa" placeholder="Add Your Title" type="text">
    @error('namabeasiswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

    <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('namaperusahaan') is-invalid @enderror" value="{{ old('namaperusahaan', $beasiswa->namaperusahaan) }}" name="namaperusahaan" placeholder="Add Your Company Name" type="text">
    @error('namaperusahaan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

    <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('batasbeasiswa') is-invalid @enderror" value="{{ old('batasbeasiswa', $beasiswa->batasbeasiswa) }}" name="batasbeasiswa" placeholder="Add Your Deadline" type="date">
    @error('batasbeasiswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
  </div>
</div>

                <div class="flex justify-left space-x-4 mb-8">
  <div class="bg-white p-4 rounded-lg shadow-md text-center relative">
    <div class="w-full flex flex-col justify-center items-center p-4"> <!-- Menyesuaikan padding untuk kontainer -->
      <!-- Menempatkan ikon pensil di tengah atas dengan posisi absolute dan sedikit menurunkan -->
      <i class="fas fa-pencil-alt mb-2 absolute top-4 left-1/2 transform -translate-x-1/2"></i>
<br>
      <input class="border-2 border-gray-400 p-2 mb-2 w-full @error('minipersyaratan') is-invalid @enderror" value="{{ old('minipersyaratan', $beasiswa->minipersyaratan) }}" name="minipersyaratan" placeholder="Add Your Requirements" type="text"/>

      <!-- error message untuk content -->
      @error('minipersyaratan')
        <div class="alert alert-danger mt-2">
          {{ $message }}
        </div>
      @enderror

      <input class="border-2 border-gray-400 p-2 w-full @error('miniisi') is-invalid @enderror" value="{{ old('miniisi', $beasiswa->miniisi) }}" name="miniisi" placeholder="Add Your Description" type="text">

      <!-- error message untuk content -->
      @error('miniisi')
        <div class="alert alert-danger mt-2">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
</div>

              <div class="flex flex-col mb-8">
     <input class="border-2 border-gray-400 p-2 mb-2 @error('persyaratan') is-invalid @enderror" name="persyaratan" value="{{ old('persyaratan', $beasiswa->persyaratan) }}" placeholder="Add Your Title" type="text"/>
       <!-- error message untuk content -->
       @error('persyaratan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
     <input class="border-2 border-gray-400 p-2 @error('isipersyaratan') is-invalid @enderror" name="isipersyaratan" value="{{ old('isipersyaratan', $beasiswa->isipersyaratan) }}" placeholder="Add Your Description" type="text">
       <!-- error message untuk content -->
       @error('isipersyaratan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
    </div>
    <div class="flex justify-left space-x-4">
    <!-- Div utama untuk upload gambar baru -->
    <div class="bg-white p-4 rounded-lg shadow-md text-center min-h-[300px] w-64 flex flex-col items-center justify-center relative">
        <label class="cursor-pointer w-full h-full flex justify-center items-center">
            <i id="icon3" class="fas fa-plus text-4xl text-gray-500 mb-2"></i>
            <input class="hidden @error('image3') is-invalid @enderror" name="image3" id="fileInput3" onchange="handleFileUpload(event, 'preview3', 'icon3', 'changeButton3')" type="file"/>
        </label>
        @error('image3')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        <img alt="File Preview" class="hidden w-full h-32 object-cover mt-2" id="preview3" style="object-fit: cover; object-position: center;">

    </div>

    <!-- Gambar sebelumnya -->
    @if($beasiswa->image3)
    <div class="flex items-center">
        <div class="mt-2">
            <p class="text-gray-700">Gambar saat ini:</p>
            <img src="{{ Storage::url('public/images/').$beasiswa->image3 }}" class="rounded" style="width: 150px; height: auto;">
        </div>
    </div>
    @endif
</div>


                       <button id="changeButton3" class="hidden absolute top-2 right-2 bg-white text-gray-800 px-3 py-1 text-sm rounded hover:bg-gray-100" onclick="triggerFileInput('fileInput3')">Change File</button>
                            <p class="text-gray-600">            <input class="border-2 border-gray-400 p-2 mt-2 @error('isi benefit') is-invalid @enderror" name="isi benefit" value="{{ old('isi_benefit', $beasiswa->isi_benefit) }}" placeholder="Add Description"></p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-8">
  <button type="submit" class="button-style">
    Simpan
  </button>
</div>
      </form>
    </div>
  </div>

  <script>
    function handleFileUpload(event, previewId, iconId, buttonId) {
      const file = event.target.files[0];
      const preview = document.getElementById(previewId);
      const icon = document.getElementById(iconId);
      const button = document.getElementById(buttonId);

      if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        icon.classList.add('hidden');
        button.classList.remove('hidden');
      }
    }

    function changeImage(inputNum) {
      const fileInput = document.getElementById('fileInput' + inputNum);
      const preview = document.getElementById('preview' + inputNum);
      const icon = document.getElementById('icon' + inputNum);
      const button = document.getElementById('changeButton' + inputNum);

      fileInput.click();

      fileInput.addEventListener('change', function(event) {
        handleFileUpload(event, 'preview' + inputNum, 'icon' + inputNum, 'changeButton' + inputNum);
      });
    }
  </script>
</body>
</html>
