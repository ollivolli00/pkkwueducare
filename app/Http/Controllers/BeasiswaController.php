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
            'image1' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'image2' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'image3' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'namabeasiswa' => 'required|string|max:255',
            'namaperusahaan' => 'required|string|max:255',
            'batasbeasiswa' => 'required|date',
            'minipersyaratan' => 'required|string|max:255',
            'miniisi' => 'required|string',
            'persyaratan' => 'required|string',
            'isipersyaratan' => 'required|string',
            'judul benefit' => 'required|string|max:255',
            'isi benefit' => 'required|string',
        ]);
    
        // Store the files
        $image1Path = $request->file('image1')->store('images', 'public');
        $image2Path = $request->file('image2')->store('images', 'public');
        $image3Path = $request->file('image3')->store('images', 'public');
    
    
     // Buat data pesanan
     $beasiswa = Beasiswa::create([
        'image1'        => $image1Path, 
        'image2'        => $image2Path, 
         'namabeasiswa'         => $request->namabeasiswa,
         'namaperusahaan'   => $request->namaperusahaan,
         'batasbeasiswa'        => $request->batasbeasiswa,
         'minipersyaratan'      => $request->minipersyaratan,
         'miniisi'        => $request->miniisi,
         'persyaratan'        => $request->persyaratan,
         'isipersyaratan'          => $request->isipersyaratan,
         'image3' => $image3Path,
         'judul benefit'=> $request->judul_benefit,
         'isi benefit'=> $request->isi_benefit
     ]);

     Beasiswa::create($request->all());

    // Redirect berdasarkan kondisi
    if ($beasiswa) {
        return redirect()->route('pesan.index')->with('success', 'Data Berhasil Disimpan!');
    } else {
        return redirect()->route('pesan.index')->with('error', 'Data Gagal Disimpan!');
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