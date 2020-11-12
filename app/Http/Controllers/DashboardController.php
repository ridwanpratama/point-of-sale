<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Barang;
use App\Distributor;
use App\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_user = User::all()->count();
        $jumlah_barang = Barang::all()->count();
        $jumlah_distributor = Distributor::all()->count();
        $jumlah_transaksi = Transaksi::all()->count();
        return view('dashboard', compact('jumlah_user', 'jumlah_barang', 'jumlah_distributor', 'jumlah_transaksi'));
    }

}
