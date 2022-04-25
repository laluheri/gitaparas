<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(function($request, $next){

            if(Gate::allows('manage-instansi')) return $next($request);
            abort(403, 'Anda tidak memiliki akses'); 
        });
    }

    public function index()
    {
        $instansi = Instansi::all();
        return view('instansi.index',[
            'instansi' => $instansi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instansi.create');
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
            'nama' => 'required',
        ]);
        $array = $request->only([
            'nama',
        ]);
        
        $instansi = Instansi::create($array);
        return redirect()->route('instansi.index')
            ->with('success_message', 'Berhasil menambah dinas baru');
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
        $instansi = Instansi::find($id);
        if (!$instansi) return redirect()->route('instansi.index')
            ->with('error_message', 'dinas dengan id'.$id.' tidak ditemukan');
        return view('instansi.edit', [
            'instansi' => $instansi
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
            'nama' => 'required',
        ]);
        $instansi = Instansi::find($id);
        $instansi->nama = $request->nama;
        $instansi->save();
        return redirect()->route('instansi.index')
            ->with('success_message', 'Berhasil mengubah nama dinas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $instansi = Instansi::find($id);
        
        if ($id == $request->user()->id) return redirect()->route('instansi.index')
            ->with('error_message', 'Anda tidak dapat menghapus dinas sendiri.');
        if ($instansi) $instansi->delete();
        return redirect()->route('instansi.index')
            ->with('success_message', 'Berhasil menghapus nama dinas');
    }
}
