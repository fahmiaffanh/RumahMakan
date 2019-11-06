<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pelanggan::paginate(10);
        return view("pelanggan.list",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelanggan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' =>'required|max:50',
            'alamat' =>'required|max:50',
            'telepon' =>'required|max:25'
        ]);
        Pelanggan::create($request->except("_token"));

        $request->session()->flash('info','Berhasil tambah data pelanggan');

        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Pelanggan::find($id);

        return view('pelanggan.form',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $request->validate([
            'nama' =>'required|max:50',
            'alamat' =>'required|max:50',
            'telepon' =>'required|max:25'
        ]);

        Pelanggan::where('id',$id)
            ->update($request->except(['_token','_method']));

        $request->session()->flash('info','Berhasil ubah data pelanggan');

        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Pelanggan::destroy($id);
         return redirect()->route('pelanggan.index')
        ->with('info','Berhasil hapus data pelanggan');
    }
}
