<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beasiswas = Beasiswa::all(); 
        return view('perusahaan.uplist', compact('beasiswas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beasiswa.create');
    
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
            'judul_benefit' => 'required|string|max:255', // kolom menggunakan spasi
            'isi_benefit' => 'required|string', // kolom menggunakan spasi
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
            'judul_benefit' => $request->judul_benefit, // Akses kolom dengan spasi
            'isi_benefit' => $request->isi_benefit, // Akses kolom dengan spasi
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('beasiswa.edit', compact('beasiswa'));
    
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
        $request->validate([
            'image1' => 'required|string',
            'image2' => 'required|string',
            'namabeasiswa' => 'required|string',
            'namaperusahaan' => 'required|string',
            'batasbeasiswa' => 'required|date',
            'minipersyaratan' => 'required|string',
            'miniisi' => 'required|string',
            'persyaratan' => 'required|string',
            'isipersyaratan' => 'required|text',
            'image3' => 'required|string',
            'judul benefit' => 'required|string',
            'isi benefit' => 'required|string',
            // Validasi untuk field lainnya
        ]);
    
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->update($request->all());
    
        return redirect()->route('perusahaan.uplist')->with('success', 'Beasiswa berhasil diperbarui');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();
    
        return redirect()->route('perusahaan.uplist')->with('success', 'Beasiswa berhasil dihapus');
        
    }
}
