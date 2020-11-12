<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Distributor::latest()->get();
	    return view ('distributor.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        Distributor::create([
            'kd_distributor' => $request->kd_distributor,
            'nama_distributor' => $request->nama_distributor,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);

        return redirect('distributor')->with('message', 'Data berhasil disimpan');
    }

    public function _validation(Request $request)
    {
        $validation = $request->validate([
            'kd_distributor' => 'required|min:3|max:20',
            'nama_distributor' => 'required|min:2|max:100',
            'alamat' => 'required|min:2|max:100',
            'no_telp' => 'required|min:6|max:20',
        ],
        [
            'kd_distributor.required' => 'harus diisi!',
            'nama_distributor.required' => 'harus diisi!',
            'alamat.required' => 'harus diisi!',
            'no_telp.required' => 'harus diisi!',
            'kd_distributor.max' => 'maksimal 20 digit!',
            'kd_distributor.min' => 'minimal 3 digit!',
            'alamat.min' => 'minimal 2 digit!',
            'nama_distributor.min' => 'minimal 2 digit!',
            'no_telp.max' => 'maksimal 20 digit!',
            'no_telp.min' => 'minimal 6 digit!',
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
        $distributor = Distributor::findOrFail($id);
        return view('distributor.edit', compact('distributor'));
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
        $distributor = Distributor::findorfail($id);
        $distributor->update($request->all());
        return redirect('distributor')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distributor = Distributor::findorfail($id);
        $distributor->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }
}
