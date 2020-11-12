<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with('barang')->latest()->get();
	    return view ('transaksi.home')->withData($data);
    }

    public function create()
    {
        $data = Barang::all();
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('data', 'transaksi'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->_validation($request);
        $barang = Barang::find($request->barang_id);
        $total_harga = $request->jumlah_beli * $barang->harga_barang;

        $sisa_stok = $barang->stok_barang - $request->jumlah_beli;
        
        $barang->update([
            'stok_barang' => $sisa_stok
        ]);

        Transaksi::create([
            'kd_transaksi' => $request->kd_transaksi,
            'jumlah_beli' => $request->jumlah_beli,
            'total_harga' => $request->total_harga,
            'tanggal_beli' => $request->tanggal_beli,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
        ]);

        return redirect('index_transaksi')->with('message', 'Transaksi berhasil');
    }   

    public function _validation(Request $request)
    {
        $validation = $request->validate([
            'kd_transaksi' => 'required|min:3',
            'jumlah_beli' => 'required|max:11',
            'total_harga' => 'required|max:11',
            'tanggal_beli' => 'required',
            'barang_id' => 'required',
            'user_id' => 'required'
        ],
        [
            'kd_transaksi.required' => 'harus diisi!',
            'kd_barang.required' => 'harus diisi!',
            'jumlah_beli.required' => 'harus diisi!',
            'total_harga.required' => 'harus diisi!',
            'tanggal_beli.required' => 'harus diisi!',
            'barang_id.required' => 'harus diisi!',
            'user_id.required' => 'harus diisi!',
            'jumlah_beli.min' => 'maksimal 11 digit!',
            'total_harga.max' => 'maksimal 11 digit!',
        ]);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findorfail($id);
        $transaksi->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }
}
