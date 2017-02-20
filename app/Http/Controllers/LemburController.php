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
use App\kategori_lembur;
use App\Pegawai;
use App\Lembur_pegawai;

class LemburController extends Controller
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
        $lembur = Lembur_pegawai::all();
        return view('FLembur.index',compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori_lembur::all();
        $pegawai = Pegawai::all();
        return view('FLembur.create',compact('kategori','pegawai')); 
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
            'Jumlah_jam' => 'required',
            ]);
        
        $lembur = new Lembur_pegawai();
        $lembur->Kode_lembur_id = $request->get('Kode_lembur_id');
        $lembur->pegawai_id = $request->get('pegawai_id');
        $lembur->Jumlah_jam = $request->get('Jumlah_jam');
        $lembur->save();
        if ($lembur->save()) {
            Session::flash('pesan_sukses','Berhasil Menambahkan Data Lembur Pegawai');
        }
        else{
            Session::flash('pesan_gagal','Gagal Menambahkan Data Lembur Pegawai');
        }
        return redirect('Lembur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Lembur_pegawai::find($id);
        $kategori = kategori_lembur::all();
        $pegawai = Pegawai::all();
        return view('FLembur.show',compact('data','kategori','pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lembur_pegawai::find($id);
        $kategori = kategori_lembur::all();
        $pegawai = Pegawai::all();
        return view('FLembur.edit',compact('data','kategori','pegawai'));
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
           'Jumlah_jam' => 'required',
        ]);

        $lembur = Lembur_pegawai::findOrFail($id);
        $lembur->Jumlah_jam = $request->get('Jumlah_jam');
        $lembur->Kode_lembur_id = $request->get('Kode_lembur_id');
        $lembur->pegawai_id = $request->get('pegawai_id');
        $lembur->save();
        if($lembur->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Lembur Pegawai');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Lembur Pegawai');
        }
        return redirect('Lembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lembur_pegawai::find($id)->delete();
        return redirect('Lembur');
    }
}
