@ -1,213 +1,212 @@
<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use App\Models\Daftar;
use Illuminate\Support\Facades\Storage;
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

public function indexx(){
    $daftars = Daftar::all(); 
    return view('perusahaan.applist1', compact('daftars'));
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

    public function store(Request $request)
    {
    
        // Validasi input
        $request->validate([
            'namalengkap' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'files.*' => 'file|mimes:jpeg,png,jpg,pdf|max:2048', // Validasi setiap file
        ]);
    
        $filePaths = []; // Array untuk menyimpan path file sementara
    
        // Periksa jika ada file yang diunggah
        if ($request->hasFile('files')) {
            // Folder sementara untuk menyimpan file sebelum di-zip
            $tempDir = storage_path('app/temp_uploads/');
            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0777, true); // Buat folder jika belum ada
            }
    
            // Simpan setiap file di folder sementara
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $tempDir . $fileName;
                $file->move($tempDir, $fileName);
                $filePaths[] = $filePath;
            }
    
            // Buat file ZIP
            $zipFileName = 'uploads_' . time() . '.zip';
            $zipFilePath = public_path('zips/' . $zipFileName);
    
            $zip = new ZipArchive;
            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                foreach ($filePaths as $file) {
                    $zip->addFile($file, basename($file)); // Tambahkan setiap file ke ZIP
                }
                $zip->close();
            }
    
            // Hapus file sementara setelah di-zip
            foreach ($filePaths as $file) {
                unlink($file);
            }
        }
    
        // Buat data beasiswa
        $data = Daftar::create([
            'namalengkap' => $request->namalengkap,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'zip_file' => 'zips/' . $zipFileName, // Simpan path ZIP di database
        ]);
    
        // Redirect berdasarkan kondisi penyimpanan
        if ($data) {
            return redirect()->route('beasiswaa.index')->with('success', 'Data Berhasil Disimpan!');
        } else {
            return redirect()->route('beasiswaa.index')->with('error', 'Data Gagal Disimpan!');
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
        // Fetch applicants with pagination (adjust the number 10 if needed)
        $daftars = Daftar::paginate(10); 
    
        // Return the view and pass the paginated data
        return view('perusahaan.applist1', compact('daftars'));
    }

  
}
