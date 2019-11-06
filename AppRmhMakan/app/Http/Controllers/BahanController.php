<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bahan;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Bahan::paginate(10);
        return view("bahan.list",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bahan.form');
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
            'harga'=>'required|digits_between:4,6|numeric',
            'qty'=>'required|digits_between:1,4|numeric',
            'satuan' =>'required|max:20'
        ]);
        Bahan::create($request->except("_token"));

        $request->session()->flash('info','Berhasil tambah data bahan');

        return redirect()->route('bahan.index');
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
        $data = Bahan::find($id);

        return view('bahan.form',compact('data'));
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
            'harga'=>'required|digits_between:4,6|numeric',
            'qty'=>'required|digits_between:1,4|numeric',
            'satuan' =>'required|max:20'
        ]);

        Bahan::where('id',$id)
            ->update($request->except(['_token','_method']));

        $request->session()->flash('info','Berhasil ubah data bahan');

        return redirect()->route('bahan.index');
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
        Bahan::destroy($id);
         return redirect()->route('bahan.index')
        ->with('info','Berhasil hapus data bahan');
    }
}
