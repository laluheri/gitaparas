<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-user')) return $next($request);
            abort(403, 'Anda tidak memiliki akses'); 

            if(Gate::allows('manage-klasifikasi')) return $next($request);
            abort(403, 'Anda tidak memiliki akses'); 

            if(Gate::allows('manage-instansi')) return $next($request);
            abort(403, 'Anda tidak memiliki akses'); 
            

        });
    }


    public function index()
    {
        $user_id = Auth::user()->id;
        $role = Auth::user()->role;
        if($role === 'admin'){
            $users = User::all();
        }else{
            $users = User::where("id", Auth::user()->id)->get();
        }

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instansi = Instansi::all();
        return view('users.create',[
            'instansi' => $instansi
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
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $array = $request->only([
            'name',
            'email', 
            'password',
        ]);
        $array['instansi_id'] = $request->get('instansi');
        $array['password'] = bcrypt($array['password']);
        
        $user = User::create($array);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
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
        $user = Crypt::decrypt($id);
        // $user = User::find($user);
        if (!$user) return redirect()->route('users.index')
            ->with('error_message', 'User dengan id'.$user.' tidak ditemukan');
        // return response()->json($user, 200);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function changePassword(){
        return 'dd';
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
        $user = Crypt::decrypt($id);
        $request->validate([
            // 'name' => 'required',
            // 'email' => 'required|email|unique:users,email,'.$decrypted_id,
            'password' => 'sometimes|nullable|confirmed'
        ]);
        // $user = User::find($decrypted_id);
        $user->name = $user->name;
        $user->email = $user->email;
        if ($request->password) $user->password = bcrypt($request->password);
        // return response()->json($user, 200);
        $user->save();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil mengubah password');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($user) $user->delete();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
