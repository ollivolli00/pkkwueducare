<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educare - {{$beasiswa->namabeasiswa}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
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
                        <span> Uploaded List</span>
                    </a>
                    <a class="nav-link {{ Request::routeIs('applist-1') ? 'active' : '' }}" href="{{ route('applist-1') }}">
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
            <br>
            <form action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($beasiswa)
                    <div class="flex justify-center mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-screen-lg">

                            <!-- Gambar pertama -->
                            <img src="{{ asset('storage/images/' . $beasiswa->image1) }}" alt="{{$beasiswa->namabeasiswa}}" class="w-full h-auto md:h-[200px] object-cover rounded-lg mb-4"/>

                            <!-- Bagian teks dan gambar kedua -->
                            <div class="flex items-center mb-4 pl-4">
                                <img src="{{ asset('storage/images/' . $beasiswa->image2) }}" alt="{{$beasiswa->namabeasiswa}}" class="mr-4" height="150" width="150"/>
                                <div class="pl-4">
                                    <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('namabeasiswa') is-invalid @enderror" value="{{ old('namabeasiswa', $beasiswa->namabeasiswa) }}" name="namabeasiswa" placeholder="Add Your Title" type="text">
                                    @error('namabeasiswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

                                    <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('namaperusahaan') is-invalid @enderror" value="{{ old('namaperusahaan', $beasiswa->namaperusahaan) }}" name="namaperusahaan" placeholder="Add Your Company Name" type="text">
                                    @error('namaperusahaan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

                                    <input class="border-2 border-gray-400 p-2 mb-4 w-full @error('batasbeasiswa') is-invalid @enderror" value="{{ old('batasbeasiswa', $beasiswa->batasbeasiswa) }}" name="batasbeasiswa" placeholder="Add Your Deadline" type="date">
                                    @error('batasbeasiswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>

                           <!-- Mini Persyaratan -->
<div class="flex justify-left space-x-4 mb-8 pl-6">
    @foreach($beasiswa->minipersyaratan as $key => $minipersyaratan)
        <div class="bg-white p-5 rounded-lg shadow-md text-center w-56 transition-transform transform hover:scale-105 hover:shadow-xl">
            <input class="border-2 border-gray-400 p-2 w-full mb-3 @error('minipersyaratan.'.$key) is-invalid @enderror" value="{{ old('minipersyaratan.' . $key, $minipersyaratan) }}" name="minipersyaratan[{{$key}}]" placeholder="Edit Persyaratan" type="text">
            @error('minipersyaratan.'.$key)<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

            @if(isset($beasiswa->miniisi[$key]))
                <div class="flex space-x-4 mt-3">
                    <div class="p-4 rounded-md w-48">
                        <input class="border-2 border-gray-400 p-2 w-full @error('miniisi.'.$key) is-invalid @enderror" value="{{ old('miniisi.' . $key, $beasiswa->miniisi[$key]) }}" name="miniisi[{{$key}}]" placeholder="Edit Mini Isi" type="text">
                        @error('miniisi.'.$key)<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
                            <!-- Persyaratan -->
                            <div class="mb-8 pl-8">
                                <input class="border-2 border-gray-400 p-2 mb-2 @error('persyaratan') is-invalid @enderror" name="persyaratan" value="{{ old('persyaratan', $beasiswa->persyaratan) }}" placeholder="Add Your Title" type="text"/>
                                @error('persyaratan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

                                <div class="text-gray-700">
                                    <textarea name="isipersyaratan" id="ckeditor" class="ckeditor">{!! old('isipersyaratan', $beasiswa->isipersyaratan) !!}</textarea>
                                </div>
                            </div>

                            <!-- Benefit -->
                            <div class="mb-8 pl-8">
                                <input class="p-2 @error('judul_benefit') is-invalid @enderror border-2 border-gray-400 w-1/2" name="judul_benefit" value="{{ old('judul_benefit', $beasiswa->judul_benefit) }}" placeholder="Add Your Description" type="text">
                                @error('judul_benefit')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <br>
                              <!-- Mini Persyaratan -->
<div class="flex justify-left space-x-4 mb-8 pl-6">
    @foreach($beasiswa->bidang_benefit as $key => $bidang_benefit)
        <div class="bg-white p-5 rounded-lg shadow-md text-center w-56 transition-transform transform hover:scale-105 hover:shadow-xl">
            <input class="border-2 border-gray-400 p-2 w-full mb-3 @error('bidang_benefit.'.$key) is-invalid @enderror" value="{{ old('bidang_benefit.' . $key, $bidang_benefit) }}" name="bidang_benefit[{{$key}}]" placeholder="Edit Persyaratan" type="text">
            @error('bidang_benefit.'.$key)<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

            @if(isset($beasiswa->isi_benefit[$key]))
                <div class="flex space-x-4 mt-3">
                    <div class="p-4 rounded-md w-48">
                        <input class="border-2 border-gray-400 p-2 w-full @error('isi_benefit.'.$key) is-invalid @enderror" value="{{ old('isi_benefit.' . $key, $beasiswa->isi_benefit[$key]) }}" name="isi_benefit[{{$key}}]" placeholder="Edit Mini Isi" type="text">
                        @error('isi_benefit.'.$key)<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
                            <br>
                            <!-- Tombol untuk menutup form -->
                            <div class="flex justify-center mt-8">
                                <button type="submit" class="button-style">Simpan</button>
                            </div>
                        </div>
                    </div>
                @endif
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