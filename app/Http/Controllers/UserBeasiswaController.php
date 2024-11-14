<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use App\Models\Daftar;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use ZipArchive;
class UserBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Mengambil 4 beasiswa terbaru yang sudah dipublikasikan
    $beasiswaa = Beasiswa::where('is_published', 1)
                          ->orderBy('created_at', 'desc')
                          ->take(4) // Ambil hanya 4 beasiswa terbaru
                          ->get();

    // Mengambil total beasiswa yang sudah dipublikasikan
    $totalBeasiswa = Beasiswa::where('is_published', 1)->count();

    // Mengambil 4 beasiswa yang paling banyak dilihat
    $mostViewedBeasiswa = Beasiswa::where('views', '>', 0)
    ->orderBy('views', 'desc')
    ->take(4)
    ->get(); 
       return view('welcome', compact('beasiswaa', 'totalBeasiswa', 'mostViewedBeasiswa'));
}
    
public function index1()
{
    // Mengambil ID beasiswa yang sudah ditampilkan di welcome
    $beasiswaIds = Beasiswa::where('is_published', 1)
                           ->orderBy('created_at', 'desc')
                           ->take(4) // Ambil ID dari 4 beasiswa terbaru
                           ->pluck('id'); // Ambil hanya ID-nya

    // Mengambil semua beasiswa yang sudah dipublikasikan, kecuali yang sudah ditampilkan
    $beasiswaa = Beasiswa::where('is_published', 1)
                          ->whereNotIn('id', $beasiswaIds) // Mengecualikan ID beasiswa yang sudah ditampilkan
                          ->orderBy('created_at', 'asc') // Mengurutkan berdasarkan tanggal terlama
                          ->get();

    // Mendecode JSON jika perlu
    foreach ($beasiswaa as $beasiswa) {
        $beasiswa->miniisi = json_decode($beasiswa->miniisi);
    }

    // Mengirimkan data beasiswa ke view
    return view('lebihbanyak', compact('beasiswaa'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
     public function store(Request $request, $beasiswaId)
{
    // Validasi input untuk memastikan ada file yang diupload
    $request->validate([
        'file_upload.*' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048', // Validasi setiap file
    ]);

    // Ambil data pengguna yang login dari tabel Pengguna
    $pengguna = Pengguna::where('id_user', auth()->id())->first();

    // Cek jika pengguna tidak ditemukan
    if (!$pengguna) {
        return redirect()->route('beasiswaa.index')->with('error', 'Pengguna tidak ditemukan!');
    }

    // Periksa apakah ada file yang di-upload
    if ($request->hasFile('file_upload')) {
        $files = $request->file('file_upload'); // Ambil semua file yang diupload

        // Array untuk menyimpan path file yang diupload
        $filePaths = [];
        $zipFileName = time() . '_beasiswa_files.zip'; // Nama file ZIP dengan timestamp

        // Tentukan direktori tempat file ZIP disimpan
        $zipFilePath = storage_path('app/public/files/' . $zipFileName);

        // Membuat instance ZIP archive
        $zip = new \ZipArchive;

        // Membuka file ZIP untuk ditulis
        if ($zip->open($zipFilePath, \ZipArchive::CREATE) === TRUE) {
            // Menambahkan file ke dalam ZIP
            foreach ($files as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName(); // Menyimpan file dengan nama yang unik
                $filePath = $file->storeAs('public/files', $fileName); // Menyimpan file di folder 'public/files'

                // Tambahkan file ke dalam ZIP
                $zip->addFile(storage_path('app/' . $filePath), $fileName);

                // Menyimpan path file yang diupload untuk referensi (untuk kemungkinan penggunaan nanti)
                $filePaths[] = $filePath;
            }

            // Menutup ZIP setelah selesai
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Gagal membuat file ZIP!');
        }

        // Simpan data pendaftaran ke tabel Daftar dengan informasi file ZIP
        Daftar::create([
            'user_id' => auth()->id(), // ID user yang sedang login
            'beasiswa_id' => $beasiswaId,
            'file_upload' => json_encode($filePaths), // Simpan path file ke kolom 'file_upload' sebagai JSON
            'zip_file' => $zipFileName, // Simpan nama file ZIP
            'namalengkap' => $pengguna->namalengkap,
            'tanggal_lahir' => $pengguna->tanggal_lahir,
            'jenis_kelamin' => $pengguna->jenis_kelamin,
            'email' => $pengguna->email,
            'no_telp' => $pengguna->no_telp,
            'image' => $pengguna->image,
        ]);

        return redirect()->route('beasiswaa.show', $beasiswaId)->with('success', 'Data Anda Berhasil Tersimpan, Kami Akan Kabari Anda Lebih Lanjut!');
    } else {
        return redirect()->back()->with('error', 'Data Anda Tidak Terkirim Kepada Kami, Silahkan Upload FIle Terlebih Dahulu!');
    }
}

       
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beasiswaa = Beasiswa::find($id); 
        $beasiswaa->minipersyaratan = json_decode($beasiswaa->minipersyaratan);
        $beasiswaa->miniisi = json_decode($beasiswaa->miniisi);
        $beasiswaa->bidang_benefit = json_decode($beasiswaa->bidang_benefit);
        $beasiswaa->isi_benefit = json_decode($beasiswaa->isi_benefit);
        $beasiswaa->increment('views'); // Meningkatkan jumlah views

        // Cek apakah beasiswa ditemukan
        if (!$beasiswaa) {
            // Jika tidak ditemukan, Anda bisa mengalihkan atau menampilkan pesan error
            return redirect()->route('beasiswa.index')->with('error', 'Beasiswa tidak ditemukan.');
        }

        // Mengirim data ke view
        return view('beasiswa', compact('beasiswaa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // UserBeasiswaController.php
    public function applicantsList()
    {
           // Ambil company_id dari auth user atau parameter request
          // Ambil company_id dari auth guard perusahaan
        $companyId = auth('perusahaan')->user()->id; // Pastikan ini benar dan sesuai dengan struktur database Anda

        // Ambil data pendaftar berdasarkan company_id yang ada di tabel beasiswa
        $daftars = Daftar::with('beasiswa') // Mengambil relasi beasiswa
            ->whereHas('beasiswa', function($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })
            ->paginate(10); 
   
        return view('perusahaan.applist1', compact('daftars'));
    }
    

  
}
