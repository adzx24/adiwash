<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ownercontroller extends Controller
{
    public function reportowner (transaksi $transaksi) {
        $data = transaksi::all();
        return view('owner.report',compact('data'));
    }
    public function cetakpdfo (transaksi $transaksi) {

        $pdf = Pdf::loadview('owner.pdf',compact('transaksi'));
        return $pdf->download('transaksipembayaran.pdf');
    }
    public function cetakpdfow () {
        $transaksi = transaksi::all();
        $pdf = Pdf::loadView('cetakpdf', compact('transaksi'));
        return $pdf->download('laporantransaksi.pdf');
        // $transaksi = transaksi::all();
        // $pdf = Pdf::loadview('cetakpdf',compact('transaksi'));
    }
    public function clearAll () {
        transaksi::where('user_id',auth()->id())->delete();
        return redirect('reportowner');
    }
    function pdfByDate (Request $request) {
      


        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        $startdate = \Carbon\Carbon::parse($startdate)->startOfDay();
        $enddate = \Carbon\Carbon::parse($enddate)->endOfDay();

        $transaksi = transaksi::whereBetween('created_at',[$startdate,$enddate])->get();

        $pdf = Pdf::loadView('cetakpdf', compact('transaksi'));
        return $pdf->download('laporantransaksi.pdf');
    }
}
