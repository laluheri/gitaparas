<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::all();
        return view('offices.index',[
            'offices' => $office
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offices.create');
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
            'name' => 'required',
        ]);
        $array = $request->only([
            'name',
        ]);
        
        $office = Office::create($array);
        return redirect()->route('offices.index')
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
        $office = Office::find($id);
        if (!$office) return redirect()->route('offices.index')
            ->with('error_message', 'dinas dengan id'.$id.' tidak ditemukan');
        return view('offices.edit', [
            'office' => $office
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
            'name' => 'required',
        ]);
        $office = Office::find($id);
        $office->name = $request->name;
        $office->save();
        return redirect()->route('offices.index')
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
        $office = Office::find($id);
        
        if ($id == $request->user()->id) return redirect()->route('offices.index')
            ->with('error_message', 'Anda tidak dapat menghapus dinas sendiri.');
        if ($office) $office->delete();
        return redirect()->route('offices.index')
            ->with('success_message', 'Berhasil menghapus nama dinas');
    }
}
