<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index()
    {
        $profil = Profil::where('user_id', Auth::id())->first();

        return $profil 
            ? redirect()->route('pengguna.edit', $profil->id)
            : redirect()->route('pengguna.create');
    }

    public function create()
    {
        return view('pengguna.create');
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

        $profil = Profil::create([
            'user_id' => Auth::id(),
            'namalengkap' => $request->namalengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'image' => $imageName,
        ]);

        return redirect()->route('pengguna.show', $profil->id)->with('success', 'Data Berhasil Disimpan!');
    }

    public function show($id)
    {
        $penggunas = Profil::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('pengguna.show', compact('penggunas'));
    }

    public function edit($id)
    {
        $penggunas = Profil::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('pengguna.edit', compact('penggunas'));
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

            $profil = Profil::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
            $data = $request->except('image');

            if ($request->hasFile('image')) {
                if ($profil->image && Storage::disk('public')->exists('images/' . $profil->image)) {
                    Storage::disk('public')->delete('images/' . $profil->image);
                }

                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->storeAs('public/images', $imageName);
                $data['image'] = $imageName;
            }

            $profil->update($data);
            return redirect()->route('pengguna.show', $profil->id)->with('success', 'Data Berhasil Diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.')->withInput();
        }
    }

    public function destroy($id)
    {
        $profil = Profil::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($profil->image && Storage::disk('public')->exists('images/' . $profil->image)) {
            Storage::disk('public')->delete('images/' . $profil->image);
        }

        $profil->delete();
        return redirect()->route('pengguna.create')->with('success', 'Data Berhasil Dihapus!');
    }
}
