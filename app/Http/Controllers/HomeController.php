<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klasifikasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $date = date('Y-m-d');
        $user_role = \Auth::user()->role;
        $user = \Auth::user()->id;
        $instansi = \App\Models\Instansi::all()->count();
        $users = User::all()->count();
        $klasifikasi = Klasifikasi::all()->count();

        if($user_role == 'admin'){
            $arsip = \App\Models\Arsip::all()->count();
        }else{
            $arsip = \App\Models\Arsip::where('user_id','=',$user)->get()->count();
        }
        $arsip_kadaluarsa = \App\Models\Arsip::get()
                ->where('tgl_kadaluarsa', '<=', date('Y-m-d'))->count();
        
        return view('home',[
            'users'=> $users,
            'instansi'=>$instansi,
            'klasifikasi'=> $klasifikasi,
            'arsip' => $arsip,
            'arsip_kadaluarsa' => $arsip_kadaluarsa,
        ]);
    }
}
