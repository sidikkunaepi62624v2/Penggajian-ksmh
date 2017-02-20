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
use App\Kategori_lembur;
use App\Golongan;
use App\Jabatan;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }

    public function index()
    {
        $kategori = Kategori_lembur::all();
        return view('FKategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $gol = Golongan::all();
        return view('FKategori.create',compact('jabatan','gol')); 
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
            'Kode_lembur' => 'required',
            'Besaran_uang'  => 'required',
            ]);
        
        $kategori = new kategori_lembur();
        $kategori->Kode_lembur = $request->get('Kode_lembur');
        $kategori->jabatan_id = $request->get('jabatan_id');
        $kategori->golongan_id = $request->get('golongan_id');
        $kategori->Besaran_uang = $request->get('Besaran_uang');
        $kategori->save();
        if ($kategori->save()) {
            Session::flash('pesan_sukses','Berhasil Menambahkan Data Kategori Lembur');
        }
        else{
            Session::flash('pesan_gagal','Gagal Menambahkan Data Kategori Lembur');
        }
        return redirect('Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = kategori_lembur::find($id);
        $jabatan = Jabatan::all();
        $gol = Golongan::all();
        return view('FKategori.show',compact('data','jabatan','gol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = kategori_lembur::find($id);
        $jabatan = Jabatan::all();
        $gol = Golongan::all();
        return view('FKategori.edit',compact('data','jabatan','gol'));
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
           'Kode_lembur' => 'required',
           'Besaran_uang'  => 'required',
        ]);

        $kategori = kategori_lembur::findOrFail($id);
        $kategori->Kode_lembur = $request->Kode_lembur;
        $kategori->jabatan_id = $request->jabatan_id;
        $kategori->golongan_id = $request->golongan_id;
        $kategori->Besaran_uang = $request->Besaran_uang;
        $kategori->save();
        if($kategori->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Kategori Lembur');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Kategori Lembur');
        }
        return redirect('Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori_lembur::find($id)->delete();
        return redirect('Kategori');
    }
}
