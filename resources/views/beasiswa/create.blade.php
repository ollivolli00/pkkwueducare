<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Educare</title>
  <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    .dynamic-container {
      display: flex;
      align-items: flex-start;
    }
    .field-container {
      margin-right: 1rem; /* Space between fields */
      flex: 0 0 auto; /* Prevent flex items from growing */
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
    <form action="{{ route('beasiswa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <br>

        <div class="bg-gray-300 h-40 flex justify-center items-center mb-8 relative" style="max-width: 100%; max-height: 100%; border-radius: 10px;">
          <i id="fileInputTooltip" class="fas fa-info-circle text-gray-500 cursor-pointer absolute top-2 right-2 z-10" data-tippy-content="Pilih header untuk halaman beasiswamu" style="pointer-events: all;"></i>

          <label class="cursor-pointer w-full h-full flex justify-center items-center relative">
              <i id="icon1" class="fas fa-plus text-4xl text-gray-500"></i>
              <input class="hidden @error('image1') is-invalid @enderror" name="image1" id="fileInput1" onchange="handleFileUpload(event, 'preview1', 'icon1', 'changeButton1')" type="file"  aria-describedby="fileInputTooltip" required/>
          </label>
          @error('image1')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          <img alt="File Preview" class="hidden relative w-full h-full object-cover" id="preview1" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%; border-radius: 10px; object-fit: cover; object-position: center;">
          <button id="changeButton1" class="hidden absolute top-2 right-2 bg-white text-gray-800 px-3 py-1 text-sm rounded hover:bg-gray-200" type="button" onclick="changeImage(1)">Change Image</button>
        </div>
        <div class="flex items-center mb-8">
            <div class="w-1/6 h-20 flex justify-center items-center border-2 border-gray-400 relative mr-4">
                <i id="fileInputTooltip" class="fas fa-info-circle text-gray-500 cursor-pointer absolute top-2 right-2 z-10" data-tippy-content="Pilih logo beasiswamu" style="pointer-events: all;"></i>  
                <label class="cursor-pointer w-full h-full flex justify-center items-center relative">
                    <i id="icon2" class="fas fa-plus text-4xl text-gray-500 absolute"></i>
                    <input class="hidden @error('image2') is-invalid @enderror" name="image2" id="fileInput2" onchange="handleFileUpload(event, 'preview2', 'icon2', 'changeButton2')" type="file" aria-describedby="fileInputTooltip" required>
                </label>
                @error('image2')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                <img id="preview2" class="hidden absolute top-0 left-0 w-full h-full object-cover" alt="Preview">
            </div>
            <div class="w-3/4 flex flex-col">
                <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('namabeasiswa') is-invalid @enderror" name="namabeasiswa" placeholder="Contoh: Beasiswa BCA" type="text" title="Masukkan nama beasiswa" required>
                @error('namabeasiswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('namaperusahaan') is-invalid @enderror" name="namaperusahaan" placeholder="Contoh: BANK BCA" type="text" title="Masukkan nama perusahaan" required>
                @error('namaperusahaan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('batasbeasiswa') is-invalid @enderror" name="batasbeasiswa" placeholder="Contoh: 19/10/2025" type="date" title="Masukkan batas beasiswa" required>
                @error('batasbeasiswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="dynamic-container mb-8" id="dynamicFields1">
    <div class="field-container bg-white p-4 rounded-lg shadow-md text-center relative">
        <div class="w-full flex flex-col justify-center items-center p-4">
            <i class="fas fa-pencil-alt mb-2 absolute top-4 left-1/2 transform -translate-x-1/2"></i>
            <br>
            <input class="border-2 border-gray-400 p-2 mb-2 w-full" name="minipersyaratan[]" placeholder="Contoh: Pendidikan" type="text" title="Masukkan judul kualifikasi" required/>
            <textarea class="border-2 border-gray-400 p-2 w-full" name="miniisi[]" placeholder="Contoh: Minimal Pendidikan S1/Sederajat" title="Masukkan isi kualifikasi" required></textarea>
        </div>
    </div>
    <div class="flex justify-center mb-8">
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" id="addButton1" onclick="addNewField('dynamicFields1')">+</button>
    </div>
</div>

        

        <div class="flex flex-col mb-8">
            <input class="border-2 border-gray-400 p-2 mb-2 @error('persyaratan') is-invalid @enderror" name="persyaratan" placeholder="Contoh: Persyaratan Khusus" type="text" title="Masukkan judul persyaratan" required/>
            @error('persyaratan')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <textarea class="border-2 border-gray-400 p-2 @error('isipersyaratan') is-invalid @enderror" name="isipersyaratan" placeholder="Contoh: 1. Scan KTP 2. Scan KK (dianjurkan memakai bullets point)" title="Masukkan isi persyaratan" required></textarea>
            @error('isipersyaratan')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col mb-8">
            <input class="border-2 border-gray-400 p-2 mb-2 @error('judul_benefit') is-invalid @enderror" name="judul_benefit" placeholder="Contoh: Benefit Yang Akan Kamu Dapatkan" type="text" title="Masukkan judul benefit" required/>
            @error('judul_benefit')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

          <!-- Dynamic Fields for Bidang Benefit -->
<div class="dynamic-container mb-8" id="dynamicFields2">
    <div class="field-container bg-white p-4 rounded-lg shadow-md text-center relative">
        <div class="w-full flex flex-col justify-center items-center p-4">
            <i class="fas fa-pencil-alt mb-2 absolute top-4 left-1/2 transform -translate-x-1/2"></i>
            <br>
            <input class="border-2 border-gray-400 p-2 mb-2 w-full" name="bidang_benefit[]" placeholder="Contoh: Dana Pendidikan" type="text" title="Masukkan bidang benefitmu" required/>
            <textarea class="border-2 border-gray-400 p-2 w-full" name="isi_benefit[]" placeholder="Contoh: Mendapatkan dana pendidikan sebesar 1.500.000/bulan" title="Masukkan isi benefitmu"></textarea>
        </div>
    </div>
    <div class="flex justify-center mb-8">
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" id="addButton2" onclick="addNewField('dynamicFields2')">+</button>
    </div>
</div>
        <div class="flex justify-center mt-8">
            <button type="submit" class="buttonn-style">
                Submit
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
    
    CKEDITOR.replace('isipersyaratan'); // Ganti 'isipersyaratan' dengan name atau id dari textarea kamu
    document.addEventListener('DOMContentLoaded', function () {
      tippy('#fileInputTooltip', {
        placement: 'right', // Posisi tooltip
        animation: 'fade', // Animasi tooltip
        arrow: true, // Tampilkan panah
      });
    });
        
    function addNewField(idContainer) {
    const dynamicFieldsContainer = document.getElementById(idContainer);

    // Hapus tombol + yang sebelumnya jika ada
    const existingButton = document.getElementById(idContainer === 'dynamicFields1' ? 'addButton1' : 'addButton2');
    if (existingButton) {
        existingButton.remove();
    }

    const fieldContainer = document.createElement('div');
    fieldContainer.classList.add('field-container', 'bg-white', 'p-4', 'rounded-lg', 'shadow-md', 'text-center', 'relative', 'flex', 'items-center', 'justify-between');

    // Membuat field input dan textarea
    if (idContainer === 'dynamicFields1') {
        // HTML untuk 'minipersyaratan' fields
        fieldContainer.innerHTML = `
            <div class="w-full flex flex-col justify-center items-center p-4">
                <i class="fas fa-pencil-alt mb-2 absolute top-4 left-1/2 transform -translate-x-1/2"></i>
                <br>
                <input class="border-2 border-gray-400 p-2 mb-2 w-full" name="minipersyaratan[]" placeholder="Contoh: Pendidikan" type="text" title="Masukkan judul kualifikasi" required/>
                <textarea class="border-2 border-gray-400 p-2 w-full" name="miniisi[]" placeholder="Contoh: Minimal Pendidikan S1/Sederajat" title="Masukkan isi kualifikasi" required></textarea>
            </div>
        `;
    } else if (idContainer === 'dynamicFields2') {
        // HTML untuk 'bidang_benefit' fields
        fieldContainer.innerHTML = `
            <div class="w-full flex flex-col justify-center items-center p-4">
                <i class="fas fa-pencil-alt mb-2 absolute top-4 left-1/2 transform -translate-x-1/2"></i>
                <br>
                <input class="border-2 border-gray-400 p-2 mb-2 w-full" name="bidang_benefit[]" placeholder="Contoh: Dana Pendidikan" type="text" title="Masukkan bidang benefitmu" required/>
                <textarea class="border-2 border-gray-400 p-2 w-full" name="isi_benefit[]" placeholder="Contoh: Mendapatkan dana pendidikan sebesar 1.500.000/bulan" title="Masukkan isi benefitmu" required></textarea>
            </div>
        `;
    }

    // Menambahkan field ke dalam container dynamicFields
    dynamicFieldsContainer.appendChild(fieldContainer);

    // Membuat tombol "add" di sebelah kanan setiap field baru
    const addButton = document.createElement('button');
    addButton.id = 'addButton';  // Beri ID agar mudah ditemukan
    addButton.type = 'button';
    addButton.classList.add('bg-blue-500', 'text-white', 'px-4', 'py-2', 'rounded', 'mt-4'); // Tambahkan margin top untuk jarak
    addButton.innerText = '+';
    addButton.setAttribute('onclick', `addNewField('${idContainer}')`);

    // Menambahkan tombol ke dalam container dynamicFields
    dynamicFieldsContainer.appendChild(addButton);
}
  </script>
</body>
</html>