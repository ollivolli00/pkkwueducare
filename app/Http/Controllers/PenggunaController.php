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
        $penggunas = Pengguna::where('id_user', Auth::id())->first();

        return $penggunas 
            ? redirect()->route('pengguna.show', $penggunas->id)
            : redirect()->route('pengguna.create');
    }

    public function create()
    {
        return view('profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namalengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'email' => 'required|email|max:255|unique:penggunas,email',
            'no_telp' => 'required|string|max:15',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/images', $imageName);

        $penggunas = Pengguna::create([
            'id_user' => Auth::id(),
            'namalengkap' => $request->namalengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'image' => $imageName,
        ]);

        return redirect()->route('profile.show')->with('success', 'Data Berhasil Disimpan!');
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

            if ($request->hasFile('image')) {
                if ($penggunas->image && Storage::disk('public')->exists('images/' . $penggunas->image)) {
                    Storage::disk('public')->delete('images/' . $penggunas->image);
                }

                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->storeAs('public/images', $imageName);
                $data['image'] = $imageName;
            }

            $penggunas->update($data);
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
