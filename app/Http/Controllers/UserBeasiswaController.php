<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use App\Models\Daftar;
use Illuminate\Http\Request;

class UserBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Mengambil hanya beasiswa yang sudah dipublikasikan
    $beasiswaa = Beasiswa::where('is_published', true)->latest()->first();
    
    // Mengirimkan data beasiswa ke view
    return view('welcome', compact('beasiswaa'));
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
        $request->validate([
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'namabeasiswa' => 'required|string|max:255',
            'namaperusahaan' => 'required|string|max:255',
            'batasbeasiswa' => 'required|date',
            'minipersyaratan' => 'required|string|max:255',
            'miniisi' => 'required|string',
            'persyaratan' => 'required|string',
            'isipersyaratan' => 'required|string',
            'judul_benefit' => 'required|string|max:255',
            'isi_benefit' => 'required|string',
        ]);

        // Simpan file
        $image1 = $request->file('image1');
        $imageName1 = $image1->hashName();  // Dapatkan nama file unik
        $image1->storeAs('public/images', $imageName1);  // Simpan gambar
    
        $image2 = $request->file('image2');
        $imageName2 = $image2->hashName();  // Dapatkan nama file unik
        $image2->storeAs('public/images', $imageName2);  // Simpan gambar
    
        $image3 = $request->file('image3');
        $imageName3 = $image3->hashName();  // Dapatkan nama file unik
        $image3->storeAs('public/images', $imageName3);  // Simpan gambar
    
        // Buat data beasiswa
        $beasiswa = Beasiswa::create([
            'image1' => $imageName1,
            'image2' => $imageName2,
            'image3' => $imageName3,
            'namabeasiswa' => $request->namabeasiswa,
            'namaperusahaan' => $request->namaperusahaan,
            'batasbeasiswa' => $request->batasbeasiswa,
            'minipersyaratan' => $request->minipersyaratan,
            'miniisi' => $request->miniisi,
            'persyaratan' => $request->persyaratan,
            'isipersyaratan' => $request->isipersyaratan,
            'judul_benefit' => $request->judul_benefit,
            'isi_benefit' => $request->isi_benefit,
        ]);
    
        // Redirect berdasarkan kondisi
        if ($beasiswa) {
            return redirect()->route('beasiswa.index')->with('success', 'Data Berhasil Disimpan!');
        } else {
            return redirect()->route('beasiswa.index')->with('error', 'Data Gagal Disimpan!');
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
}
