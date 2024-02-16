<?php

namespace App\Http\Controllers;

use App\Models\log;
use App\Models\produk;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function tambah () {
        return view('admin.tambah');
    }
    public function posttambah (Request $request, produk $produk) {
        $pk = $produk->paket;
        $data =  $request->validate([
            'paket'=>'required',
            'harga'=>'required',
            'deskripsi'=>'required',
        ]);
        produk::create([
            'paket'=>$request->paket,
            'harga'=>$request->harga,
            'user_id'=>auth()->id(),
            'deskripsi'=>$request->deskripsi,

        ]);

        log::create([
            'user_id'=>auth()->id(),
            'activity'=> 'telah menambahkan '
        ]);
        return redirect('home')->with('m','Berhasil tambah paket');
    }
    public function home () {
        $data = produk::all();
        return view('admin.home',compact('data'));
    }
    public function edit (produk $produk) {
        return view('admin.edit',compact('produk'));
    }
    public function postedit (Request $request, produk $produk) {
        $pk = $produk->paket;
        $data = $request->validate([
            'paket'=>'required',
            'harga'=>'required',
            'deskripsi'=>'required'
        ]);
        log::create([
            'user_id'=>auth()->id(),
            'activity'=> 'telah mengedit '
        ]);
        $produk->update($data);
        return redirect('home')->with('m','Berhasil update paket');
    }
    public function hapus (produk $produk) {
        $p = $produk->paket;
        // foreach($transaksi as $transaksi){
        //     $transaksi->delete();
        // }
        $produk->delete();
        log::create([
            'user_id'=>auth()->id(),
            'activity'=> 'telah menghapus '.$p
        ]);
        return redirect('home')->with('m','Berhasil hapus paket');
    }
}
