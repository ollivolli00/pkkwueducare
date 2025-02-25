<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index()
    {
        // Cek apakah pengguna sudah memiliki data pengguna
        $pengguna = Pengguna::where('id_user', Auth::id())->first();

        return $pengguna 
            ? redirect()->route('pengguna.show', $pengguna->id)
            : redirect()->route('pengguna.create');
    }

    public function create()
{
    $pengguna = Pengguna::where('id_user', Auth::id())->first();

    if ($pengguna) {
        return redirect()->route('pengguna.show', $pengguna->id);
    }

    return view('profil.create', ['pengguna' => null]); // kirim null
}


    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'namalengkap' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|string',
        'email' => 'required|email|max:255',
        'no_telp' => 'required|string|max:15',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:3072',
    ]);

    // Cek apakah pengguna sudah memiliki data pengguna
    if (Pengguna::where('id_user', Auth::id())->exists()) {
        return redirect()->route('pengguna.show', Pengguna::where('id_user', Auth::id())->first()->id);
    }

    // Proses penyimpanan gambar
    $image = $request->file('image');
    $imageName = $image->hashName();
    $image->storeAs('public/images', $imageName);

    // Simpan data pengguna
    $penggunas = Pengguna::create([
        'id_user' => Auth::id(),
        'namalengkap' => $request->namalengkap,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
        'image' => $imageName,
        'profile_complete' => 1, // Menandakan bahwa profil sudah lengkap
    ]);

    // Hapus session 'profile_incomplete' setelah profil lengkap
    session()->forget('profile_incomplete');

    // Arahkan ke halaman detail pengguna setelah berhasil disimpan
    return redirect()->route('pengguna.show', $penggunas->id)->with('success', 'Data Berhasil Disimpan, Cek Profile Anda Di Dropdown Diatas!');
}


    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);
    
        return view('profil.show', compact('pengguna'));
    }

    public function edit($id)
    {
        
        $pengguna = Pengguna::findOrFail($id);
        return view('profil.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'namalengkap' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string',
                'email' => 'required|email|max:255|unique:penggunas,email,' . $id,
                'no_telp' => 'required|string|max:15',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            ]);
        
            $penggunas = Pengguna::findOrFail($id);
            $data = $request->except('image');
        
            // Cek dan simpan gambar jika ada
            if ($request->hasFile('image')) {
                if ($penggunas->image && Storage::disk('public')->exists('images/' . $penggunas->image)) {
                    Storage::disk('public')->delete('images/' . $penggunas->image);
                }
        
                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->storeAs('public/images', $imageName);
                $data['image'] = $imageName;
            }
        
            // Pastikan data yang diterima berisi nilai yang benar
            $penggunas->update($data); // Perbarui data pengguna
        
            return redirect()->route('pengguna.show', $penggunas->id)->with('success', 'Data Berhasil Diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.')->withInput();
        }
        
    }
    
    public function destroy($id)
    {
        $penggunas = Pengguna::findOrFail($id);

        if ($penggunas->image && Storage::disk('public')->exists('images/' . $penggunas->image)) {
            Storage::disk('public')->delete('images/' . $penggunas->image);
        }

        $penggunas->delete();
        return redirect()->route('pengguna.create')->with('success', 'Data Berhasil Dihapus!');
    }
}