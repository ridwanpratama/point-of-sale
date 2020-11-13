<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest()->get();
 
        return view('laporan.transaksi',compact('transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function barang()
    {
        $barang = Barang::latest()->get();
 
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

    public function printTransaksi(Request $request)
    {
 
        $transaksi = $request->transaksi;
        $from = $request->startDate;
        $to = $request->endDate;
 
        $title ="Laporan From: ".$from."To:".$to;
        $redirect = route('laporan');   
        if(isset($from) && isset($to)){
            $startDate = $from;
            $endDate = $to;
 
            $transaksi = Transaksi::whereBetween('tanggal_beli', [$startDate,$endDate])->latest()->get();
            $startDate = explode(' ', $startDate)[0];
            $endDate = explode(' ', $endDate)[0];
 
            return view('laporan.print-transaksi', compact('transaksi', 'startDate', 'endDate', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            $transaksi = Transaksi::latest()->get();
 
            return view('laporan.print-transaksi', compact('transaksi', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
 
    }

    public function printBarang(Request $request)
    {
 
        $barang = $request->barang;
        $from = $request->startDate;
        $to = $request->endDate;
 
        $title ="Laporan From: ".$from."To:".$to;
        $redirect = route('laporan');   
        if(isset($from) && isset($to)){
            $startDate = $from;
            $endDate = $to;
 
            $barang = Barang::whereBetween('tanggal_masuk', [$startDate,$endDate])->latest()->get();
            $startDate = explode(' ', $startDate)[0];
            $endDate = explode(' ', $endDate)[0];
 
            return view('laporan.print-barang', compact('barang', 'startDate', 'endDate', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            $barang = Barang::latest()->get();
 
            return view('laporan.print-barang', compact('barang', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
 
    }
}
