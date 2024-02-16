<?php

namespace App\Http\Controllers;

use App\Models\log;
use App\Models\produk;
use App\Models\transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class kasircontroller extends Controller
{
    public function kasir () {
        $data = produk::all();
        return view('kasir.kasir',compact('data'));
    }
    public function paket ( produk $produk,$id) {
        $paket = produk::find($id);
        return view('kasir.transaksi', compact('paket'));
    }
    public function postpilih (Request $request, $id,produk $produk) {
        $p = $produk->paket;
        $request->validate([
            'notelp'=>'required',
            'nama'=>'required',
            'namapaket'=>'required',
            'harga'=>'required',
            'nominal'=>'required',
            'kembalian'=>'required',
        ]);

        transaksi::create([
            'notelp'=>$request->notelp,
            'nama'=>$request->nama,
            'namapaket'=>$request->namapaket,
            'harga'=>$request->harga,
            'nominal'=>$request->nominal,
            'user_id'=>auth()->id(),
            'produk_id'=>$id,
            'kembalian'=>$request->kembalian,

        ]);
        log::create([
            'user_id'=>auth()->id(),
            'activity'=> 'telah melakukan transaksi '
        ]);

        return redirect()->route('report')->with('m','Berhasil melakukan transaksi pembayaran');
    }
    public function report (transaksi $transaksi) {
        $data = transaksi::where('user_id',auth()->id())->with('user')->get();
        return view('kasir.report',compact('data'));
    }
    public function cetakpdf ( transaksi $transaksi) {
        $pdf = Pdf::loadview('owner.pdf',compact('transaksi'));
        return $pdf->download('transaksipembayaran.pdf');
    }
}
