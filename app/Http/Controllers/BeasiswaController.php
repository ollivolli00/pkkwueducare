<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class BeasiswaController extends Controller
{
    public function index()
    {
        if (Auth::guard('perusahaan')->check()) {
            $perusahaan = Auth::guard('perusahaan')->user();
            $beasiswas = Beasiswa::where('company_id', $perusahaan->id)->get();
            return view('perusahaan.uplist', compact('beasiswas'));
        }
    }

    public function create()
    {
        return view('beasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'namabeasiswa' => 'required|string|max:255',
            'namaperusahaan' => 'required|string|max:255',
            'batasbeasiswa' => 'required|date',
            'minipersyaratan' => 'required|array',
            'miniisi' => 'required|array',
            'persyaratan' => 'required|string',
            'isipersyaratan' => 'required|string',
            'judul_benefit' => 'required|string|max:255',
            'bidang_benefit' => 'required|array',
            'isi_benefit' => 'required|array',
        ]);

        $image1 = $request->file('image1')->store('public/images');
        $image2 = $request->file('image2')->store('public/images');
       
        $company_id = Auth::guard('perusahaan')->user()->id;

        $beasiswa = Beasiswa::create([
            'image1' => basename($image1),
            'image2' => basename($image2),
            'namabeasiswa' => $request->namabeasiswa,
            'namaperusahaan' => $request->namaperusahaan,
            'batasbeasiswa' => $request->batasbeasiswa,
            'judul_benefit' => $request->judul_benefit,
            'company_id' => $company_id,
            'persyaratan' => $request->persyaratan,
            'isipersyaratan' => $request->isipersyaratan,
            'minipersyaratan' => json_encode($request->minipersyaratan),
            'miniisi' => json_encode($request->miniisi),
            'bidang_benefit' => json_encode($request->bidang_benefit),
            'isi_benefit' => json_encode($request->isi_benefit),
        ]);

        return redirect()->route('beasiswa.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function show($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->minipersyaratan = json_decode($beasiswa->minipersyaratan);
        $beasiswa->miniisi = json_decode($beasiswa->miniisi);
        $beasiswa->bidang_benefit = json_decode($beasiswa->bidang_benefit);
        $beasiswa->isi_benefit = json_decode($beasiswa->isi_benefit);
      
        return view('perusahaan.aplistup', compact('beasiswa'));
    }

    public function edit($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->minipersyaratan = json_decode($beasiswa->minipersyaratan);
        $beasiswa->miniisi = json_decode($beasiswa->miniisi);
        $beasiswa->bidang_benefit = json_decode($beasiswa->bidang_benefit);
        $beasiswa->isi_benefit = json_decode($beasiswa->isi_benefit);

        return view('beasiswa.edit', compact('beasiswa'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'namabeasiswa' => 'required|string|max:255',
        'namaperusahaan' => 'required|string|max:255',
        'batasbeasiswa' => 'required|date',
        'minipersyaratan' => 'required|array',
        'miniisi' => 'required|array',
        'persyaratan' => 'required|string',
        'isipersyaratan' => 'required|string',
        'judul_benefit' => 'required|string|max:255',
        'isi_benefit' => 'required|array',
        'bidang_benefit' => 'required|array',
    ]);

    // Mencari data beasiswa berdasarkan ID
    $beasiswa = Beasiswa::findOrFail($id);

    // Menyimpan data yang akan diupdate
    $data = $request->only([
        'namabeasiswa',
        'namaperusahaan',
        'batasbeasiswa',
        'persyaratan',
        'isipersyaratan',
        'judul_benefit'
    ]);


    // Mengupdate field JSON
    $data['minipersyaratan'] = $request->filled('minipersyaratan') 
        ? json_encode($request->minipersyaratan) 
        : $beasiswa->minipersyaratan;

    $data['miniisi'] = $request->filled('miniisi') 
        ? json_encode($request->miniisi) 
        : $beasiswa->miniisi;

        // Mengupdate field JSON
    $data['bidang_benefit'] = $request->filled('bidang_benefit') 
    ? json_encode($request->bidang_benefit) 
    : $beasiswa->bidang_benefit;

$data['isi_benefit'] = $request->filled('isi_benefit') 
    ? json_encode($request->isi_benefit) 
    : $beasiswa->isi_benefit;

    // Update data beasiswa di database
    $updateSuccess = $beasiswa->update($data);

    // Mengecek apakah update berhasil
    if ($updateSuccess) {
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('beasiswa.index')->with('success', 'Data Berhasil Diupdate!');
    } else {
        // Menangani jika update gagal
        return redirect()->route('beasiswa.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data!');
    }
}

    
    public function destroy($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        if ($beasiswa->image1) {
            Storage::delete('public/images/' . $beasiswa->image1);
        }
        if ($beasiswa->image2) {
            Storage::delete('public/images/' . $beasiswa->image2);
        }
        if ($beasiswa->image3) {
            Storage::delete('public/images/' . $beasiswa->image3);
        }

        $beasiswa->delete();

        return redirect()->route('beasiswa.index')->with('success', 'Data beasiswa berhasil dihapus');
    }

    public function publish($id)
{
    $beasiswa = Beasiswa::findOrFail($id);
    $beasiswa->is_published = true; // Set status ke published
    $beasiswa->save();

  
    return redirect()->route('beasiswa.index', $beasiswa->id)->with('success', 'Beasiswa berhasil dipublikasikan.');
}

public function unpublish($id)
{
    $beasiswa = Beasiswa::findOrFail($id);
    $beasiswa->is_published = false; // Set status ke unpublished
    $beasiswa->save();

    return redirect()->route('beasiswa.index', $beasiswa->id)->with('success', 'Beasiswa berhasil di-unpublish.');
}
}
