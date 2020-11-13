<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest()->paginate(5);
 
        return view('laporan.transaksi',compact('transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function barang()
    {
        $barang = Barang::latest()->paginate(5);
 
        return view('laporan.barang',compact('barang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cari(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';
 
        $transaksi = Transaksi::whereBetween('tanggal_beli', [$startDate,$endDate])->latest()->paginate(5);
 
        return view('laporan.transaksi', compact('transaksi', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function search(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';
 
        $barang = Barang::whereBetween('tanggal_masuk', [$startDate,$endDate])->latest()->paginate(5);
 
        return view('laporan.barang', compact('barang', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
}
