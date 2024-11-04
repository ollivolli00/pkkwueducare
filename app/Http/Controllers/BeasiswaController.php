<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Mengambil data beasiswa dari database
    $beasiswa = Beasiswa::all();
    return view('perusahaan.index', compact('scholarships'));
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
        // Tambahkan validasi untuk field lainnya
    ]);

    Beasiswa::create($request->all());

    return redirect()->route('scholarships.index')->with('success', 'Beasiswa berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $beasiswa = Beasiswa::findOrFail($id);
    return view('scholarships.show', compact('scholarship'));
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
    return view('scholarships.edit', compact('scholarship'));
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

    return redirect()->route('scholarships.index')->with('success', 'Beasiswa berhasil diperbarui');
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

    return redirect()->route('scholarships.index')->with('success', 'Beasiswa berhasil dihapus');
}
}