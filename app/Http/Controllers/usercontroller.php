<?php

namespace App\Http\Controllers;

use App\Models\log;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    public function login () {
        return view('login');
    }
    public function postlogin (Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($data)){
            $user = auth()->user();
            if($user->role == 'kasir'){
                return redirect('kasir')->with('m','Berhasil login sebagai ' . $user->name);
            }elseif($user->role == 'admin'){
                return redirect('home')->with('m','Berhasil login sebagai ' . $user->name);
            }elseif($user->role == 'owner'){
                return redirect('reportowner')->with('m','Berhasil login sebagai ' . $user->name);
            }
        }
        return redirect('/')->with('m','Email atau password salah');
    }
    public function logout () {
        auth()->logout();
        return redirect('/')->with('m','Berhasil logout');
    }
    public function log () {
        $log = log::all();
        return view('log',compact('log'));
    }
    public function user () {
        $data = User::all();
        return view('user.user',compact('data'));
    }
    public function postuser (Request $request) {
        $request->validate([
            'name'=>'required',
            // 'role'=>'required',
            // 'email'=>'required',
            'password'=>'required',

        ]);
        User::create([
            'name'=>$request->name,
            // 'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'kasir'
        ]);
        log::create([
            'user_id'=>auth()->id(),
            'activity'=> 'telah menambahkan kasir ',
        ]);

        return redirect('user')->with('m','Berhasil tambah  user');
    }
    public function edituser (User $user) {

        return view('user.edit',compact('user'));
    }
    public function postedituser(Request $request, User $user)  {
        $data =  $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        log::create([
            'user_id'=>auth()->id(),
            'activity'=> 'telah mengedit kasir ',
        ]);
        $user->update($data);
        return redirect('user');
    }
    public function hapususer (User $user,produk $produk) {
        $k = $user->name;
        $user->delete();
        log::create([
            'user_id'=>auth()->id(),
            'activity'=> 'telah menghapus '.$k
        ]);
        return redirect('user')->with('m','Berhasil hapus kasir');
    }
    public function search (Request $request) {
      
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        $startdate = \Carbon\Carbon::parse($startdate)->startOfDay();
        $enddate = \Carbon\Carbon::parse($enddate)->endOfDay();

        $data = transaksi::whereBetween('created_at',[$startdate,$enddate])->get();
        return view('owner.report',compact('data'));
    }
    public function cari (Request $request) {

        $key = $request->input('key');
        $data = transaksi::where('nama','notelp','like'. $key . '$')->paginate(10);
        return view('cari',compact('data'));
    }

}
