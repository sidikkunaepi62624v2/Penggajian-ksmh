<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Form;
use Html;
use Input;
use Redirect;
use View;
use App\Golongan;
class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('HRD');
    }


    public function index()
    {
        $gol = Golongan::all();
        return view('FGolongan.index',compact('gol'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FGolongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'Kode_golongan' => 'required',
            'Nama_golongan' => 'required',
            'Besaran_uang'  => 'required',
            ]);
        
        $gol = new Golongan();
        $gol->Kode_golongan = $request->Kode_golongan;
        $gol->Nama_golongan = $request->Nama_golongan;
        $gol->Besaran_uang = $request->Besaran_uang;
        $gol->save();
        if ($gol->save()) {
            Session::flash('pesan_sukses','Berhasil Menambahkan Data Golongan');
        }
        else{
            Session::flash('pesan_gagal','Gagal Menambahkan Data Golongan');
        }
        return redirect('Golongan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Golongan::find($id);
        return view('FGolongan.show',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Golongan::find($id);
        return view('FGolongan.edit',compact('data'));
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
        $this->validate($request, [
            'Kode_golongan' => 'required',
            'Nama_golongan' => 'required',
            'Besaran_uang'  => 'required',
        ]);

        $gol = Golongan::findOrFail($id);
        $gol->Kode_golongan = $request->Kode_golongan;
        $gol->Nama_golongan = $request->Nama_golongan;
        $gol->Besaran_uang = $request->Besaran_uang;
        $gol->save();
        if($gol->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Golongan');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Golongan');
        }
        return redirect('Golongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Golongan::find($id)->delete();
        return redirect('Golongan');
    }
}
