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
use App\Jabatan;
use App\Golongan;
use App\Tunjangans;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Bendahara');
    }

    public function index()
    {
        $tunjangan = Tunjangans::all();
        return view('FTunjangan.index',compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('FTunjangan.create',compact('jabatan','golongan')); 
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
            'Kode_tunjangan' => 'required',
            'Status' => 'required',
            'Jumlah_anak' => 'required',
            'Besaran_uang' => 'required',
            ]);
        
        $lembur = new Tunjangans();
        $lembur->Kode_tunjangan = $request->get('Kode_tunjangan');
        $lembur->jabatan_id = $request->get('jabatan_id');
        $lembur->golongan_id = $request->get('golongan_id');
        $lembur->Status = $request->get('Status');
        $lembur->Jumlah_anak = $request->get('Jumlah_anak');
        $lembur->Besaran_uang = $request->get('Besaran_uang');
        $lembur->save();
        if ($lembur->save()) {
            Session::flash('pesan_sukses','Berhasil Menambahkan Data Lembur Pegawai');
        }
        else{
            Session::flash('pesan_gagal','Gagal Menambahkan Data Lembur Pegawai');
        }
        return redirect('Tunjangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tunjangans::find($id);
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('FTunjangan.show',compact('data','jabtan','golongan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tunjangans::find($id);
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('FTunjangan.edit',compact('data','jabatan','golongan'));
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
           'Kode_tunjangan' => 'required',
            'Status' => 'required',
            'Jumlah_anak' => 'required',
            'Besaran_uang' => 'required',
        ]);

        $lembur = Tunjangans::findOrFail($id);
        $lembur->Kode_tunjangan = $request->get('Kode_tunjangan');
        $lembur->jabatan_id = $request->get('jabatan_id');
        $lembur->golongan_id = $request->get('golongan_id');
        $lembur->Status = $request->get('Status');
        $lembur->Jumlah_anak = $request->get('Jumlah_anak');
        $lembur->Besaran_uang = $request->get('Besaran_uang');
        $lembur->save();
        if($lembur->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Lembur Pegawai');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Lembur Pegawai');
        }
        return redirect('Tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tunjangans::find($id)->delete();
        return redirect('Tunjangan');
    }
}
