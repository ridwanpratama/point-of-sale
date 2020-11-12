<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Merek;
use App\Distributor;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::with('merek', 'distributor')->latest()->get();
	    return view ('barang.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Merek::all();
        $distri = Distributor::all();
        return view('barang.create', compact('data', 'distri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->_validation($request);
        Barang::create([
            'kd_barang' => $request->kd_barang,
            'nama_barang' => $request->nama_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'harga_barang' => $request->harga_barang,
            'stok_barang' => $request->stok_barang,
            'merek_id' => $request->merek_id,
            'distributor_id' => $request->distributor_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('barang')->with('message', 'Data berhasil disimpan');
    }

    public function _validation(Request $request)
    {
        $validation = $request->validate([
            'nama_barang' => 'required|min:3',
            'tanggal_masuk' => 'required',
            'harga_barang' => 'required|min:2|max:11',
            'stok_barang' => 'required|max:11',
            'merek_id' => 'required',
            'distributor_id' => 'required',
            'keterangan' => 'required',
        ],
        [
            'nama_barang.required' => 'harus diisi!',
            'tanggal_masuk.required' => 'harus diisi!',
            'harga_barang.required' => 'harus diisi!',
            'stok_barang.required' => 'harus diisi!',
            'merek_id.required' => 'harus diisi!',
            'distributor_id.required' => 'harus diisi!',
            'harga_barang.max' => 'maksimal 11 digit!',
            'harga_barang.min' => 'minimal 2 digit!',
            'stok_barang.max' => 'maksimal 11 digit!',
            'keterangan' => 'harus diisi!',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merek = Merek::all();
        $distributor = Distributor::all();
        $barang = Barang::with('merek', 'distributor')->findOrFail($id);
        return view('barang.edit', compact('barang', 'merek', 'distributor'));
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
        $this->_validation($request);
        $barang = Barang::findorfail($id);
        $barang->update($request->all());
        return redirect('barang')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findorfail($id);
        $barang->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }
}
