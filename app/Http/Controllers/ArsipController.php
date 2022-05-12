<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $create = Arsip::get();
        // $tgl1 = $create[0]->created_at->format('Y-m-d');
        // $tgl2    = date('Y-m-d', strtotime('+1825 days', strtotime($tgl1)));
        // dd($tgl1, $tgl2);
        // return response()->json($create[0]->created_at->format('Y-m-d'), 200);
        // dd($create->kode);

        $role = Auth::user()->role;

        if($role === 'admin'){
            $jml_arsip = Arsip::all();
        }else{

            $jml_arsip = Arsip::with('klasifikasi')->where("user_id", Auth::user()->id)->get();
        }

        // return response()->json($jml_arsip, 200);
        return view('arsip.index',[
            'jml_arsip' => $jml_arsip
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_klasifikasi = \App\Models\Klasifikasi::all();
        // return response()->json($data_klasifikasi, 200);
        $instansi = \App\Models\Instansi::all();
        return view('arsip.create',[
            'data_klasifikasi' => $data_klasifikasi,
            'instansi' => $instansi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
        //     'isi'        => 'min:5',
        //     'keterangan' => 'min:5',
        // ]);
        $suratmasuk = new \App\Models\Arsip;
        $suratmasuk->no_surat   = $request->get('no_surat');
        if($request->get('asal_surat') == "lainnya"){
            $suratmasuk->asal_surat = $request->get('asal_surat_lain');    
        }else{
            $suratmasuk->asal_surat = $request->get('asal_surat');
        }
        $suratmasuk->isi        = $request->get('isi');
        $suratmasuk->klasifikasi_id = $request->get('klasifikasiId');
        $suratmasuk->tgl_surat  = $request->get('tgl_surat');
        $suratmasuk->tgl_terima = $request->get('tgl_terima');
        $suratmasuk->tgl_arsip = $request->get('tgl_arsip');
        $jra = (int)$request->get('jra')*365;
        $suratmasuk->tgl_kadaluarsa = date('Y-m-d', strtotime('+'.$jra.'days', strtotime($suratmasuk->tgl_arsip)));
        $suratmasuk->keterangan = $request->get('keterangan');
        $file                   = $request->file('filemasuk');
        $fileExt = \File::extension($file->getClientOriginalName());
        $fileName   = time().".".$fileExt;
        $file->move('berkas_arsip/', $fileName);
        $suratmasuk->file  = $fileName;
        $suratmasuk->user_id = Auth::user()->id;
        $suratmasuk->save();

        return redirect()->route('arsip.index')
            ->with('success_message', 'Berhasil menyimpan arsip baru');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download($id){
        $file = Arsip::find($id);
        $filePath = public_path('berkas_arsip/'.$file->file);
        $fileExt = \File::extension($filePath);
        $headers = ['Content-Type: application/pdf/jpg/jpeg/png'];
        $fileName = "gitaparas-".time().'.'.$fileExt;
        \App\Models\Log::record(Auth::user(), 'Aksi download arsip', "No ".$file->no_surat." Asal ".$file->asal_surat);
        return response()->download($filePath, $fileName, $headers);
    }
}
