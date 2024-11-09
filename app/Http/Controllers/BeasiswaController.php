<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use Illuminate\Support\Facades\Storage;

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
        // Mengambil data beasiswa berdasarkan ID
        $beasiswa = Beasiswa::find($id); 

        // Cek apakah beasiswa ditemukan
        if (!$beasiswa) {
            // Jika tidak ditemukan, Anda bisa mengalihkan atau menampilkan pesan error
            return redirect()->route('perusahaan.uplist')->with('error', 'Beasiswa tidak ditemukan.');
        }

        // Mengirim data ke view
        return view('perusahaan.aplistup', compact('beasiswa'));
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
        try {
            $request->validate([
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'namabeasiswa' => 'required|string|max:255',
                'namaperusahaan' => 'required|string|max:255',
                'batasbeasiswa' => 'required|date',
                'minipersyaratan' => 'required|string|max:255',
                'miniisi' => 'required|string',
                'persyaratan' => 'required|string',
                'isipersyaratan' => 'required|string',
                'judul_benefit' => 'required|string|max:255',
                'isi_benefit' => 'required|string'
            ]);
    
            $beasiswa = Beasiswa::findOrFail($id);
            
            // Siapkan data untuk update
            $data = $request->except('image3');
    
            // Handle image upload
            if ($request->hasFile('image3')) {
                // Hapus file lama
                if ($beasiswa->image3) {
                    Storage::disk('public')->delete('images/' . $beasiswa->image3);
                }
                
                // Upload file baru
                $image3 = $request->file('image3');
                $imageName3 = time() . '_' . $image3->getClientOriginalName();
                $image3->storeAs('public/images', $imageName3);
                
                // Tambahkan nama file ke data yang akan diupdate
                $data['image3'] = $imageName3;
            }
    
            // Update data
            $beasiswa->update($data);
    
            return redirect()->route('beasiswa.index')
                            ->with('success', 'Data Berhasil Diupdate!');
    
        } catch (\Exception $e) {
          
            return redirect()->route('beasiswa.edit', $id)
                            ->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
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
    
    // Hapus gambar yang terkait
    if ($beasiswa->image1) {
        Storage::delete('public/images/' . $beasiswa->image1);
    }
    if ($beasiswa->image2) {
        Storage::delete('public/images/' . $beasiswa->image2);
    }
    if ($beasiswa->image3) {
        Storage::delete('public/images/' . $beasiswa->image3);
    }

    // Hapus data beasiswa
    $beasiswa->delete();

    return redirect()->route('beasiswa.index')->with('success', 'Data beasiswa berhasil dihapus');
}

public function publish($id)
{
    $beasiswa = Beasiswa::findOrFail($id);
    $beasiswa->is_published = true; // Menandai beasiswa sebagai dipublikasikan
    $beasiswa->save();

    // Logika untuk mengirim data ke tampilan dashboard user
    // Misalnya dengan membuat query yang hanya menampilkan beasiswa `published` di dashboard user

    return redirect('/aplistup')
    ->with('success', 'Beasiswa berhasil dipublikasikan');
}


}