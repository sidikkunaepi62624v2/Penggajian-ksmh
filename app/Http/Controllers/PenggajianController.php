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
use App\Penggajian;
use App\Tunjangan_pegawai;


class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Pegawai');
    }

    public function index()
    {
        $penggajian = Penggajian::all();
        return view('FPenggajian.index',compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan = Tunjangan_pegawai::all();
        return view('FPenggajian.create',compact('tunjangan')); 
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
        $lembur->Jumlah_jam = $request->get('Jumlah_jam');
        $lembur->Kode_lembur_id = $request->get('Kode_lembur_id');
        $lembur->Pegawai_id = $request->get('Pegawai_id');
        $lembur->save();
        if ($lembur->save()) {
            Session::flash('pesan_sukses','Berhasil Menambahkan Data Lembur Pegawai');
        }
        else{
            Session::flash('pesan_gagal','Gagal Menambahkan Data Lembur Pegawai');
        }
        return redirect('Penggajian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penggajian::find($id);
        $tunjangan = Tunjangan_pegawai::all();
        return view('FPenggajian.show',compact('data','tunjangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penggajian::find($id);
        $tunjangan = Tunjangan_pegawai::all();
        return view('FPenggajian.edit',compact('data','tunjangan'));
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
        $lembur->Pegawai_id = $request->get('Pegawai_id');
        $lembur->save();
        if($lembur->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Lembur Pegawai');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Lembur Pegawai');
        }
        return redirect('Penggajian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penggajian::find($id)->delete();
        return redirect('Penggajian');
    }
}
