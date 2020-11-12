<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merek;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Merek::latest()->get();
	    return view ('merek.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merek.create');
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
        Merek::create([
            'kd_merek' => $request->kd_merek,
            'merek' => $request->merek,
        ]);

        return redirect('merek')->with('message', 'Data berhasil disimpan');
    }

    public function _validation(Request $request)
    {
        $validation = $request->validate([
            'kd_merek' => 'required|min:3|max:10',
            'merek' => 'required|min:2',
        ],
        [
            'kd_merek.required' => 'harus diisi!',
            'merek.required' => 'harus diisi!',
            'kd_merek.max' => 'maksimal 10 digit!',
            'merek.min' => 'minimal 2 digit!',
            'kd_merek.min' => 'minimal 3 digit!',
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
        $merek = Merek::findOrFail($id);
        return view('merek.edit', compact('merek'));
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
        $merek = Merek::findorfail($id);
        $merek->update($request->all());
        return redirect('merek')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merek = Merek::findorfail($id);
        $merek->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }
}
