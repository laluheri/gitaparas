<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasifikasi;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = Klasifikasi::all();
        return view('klasifikasi.index', [
            'klasifikasi' => $klasifikasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.create');
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
            'kode' => 'required',
            'nama' => 'required',
        ]);
        $array = $request->only([
            'kode',
            'nama',
        ]);
       
        $klasifikasi = Klasifikasi::create($array);
        return redirect()->route('klasifikasi.index')
            ->with('success_message', 'Berhasil menambah klasifikasi surat baru');
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
        $klasifikasi = klasifikasi::find($id);
        if (!$klasifikasi) return redirect()->route('klasifikasi.index')
            ->with('error_message', 'klasifikasi dengan id'.$id.' tidak ditemukan');
        return view('klasifikasi.edit', [
            'klasifikasi' => $klasifikasi
        ]);
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
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $klasifikasi = Klasifikasi::find($id);
        $klasifikasi->kode = $request->kode;
        $klasifikasi->nama = $request->nama;
       
        $klasifikasi->save();
        return redirect()->route('klasifikasi.index')
            ->with('success_message', 'Berhasil mengubah klasifikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $klasifikasi = Klasifikasi::find($id);
        
        if ($klasifikasi) $klasifikasi->delete();
        return redirect()->route('klasifikasi.index')
            ->with('success_message', 'Berhasil menghapus klasifikasi');
    }
}