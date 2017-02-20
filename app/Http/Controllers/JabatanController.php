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

class JabatanController extends Controller
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
        $jabatan = Jabatan::all();
        return view('FJabatan.index',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FJabatan.create'); 
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
            'Kode_jabatan' => 'required',
            'Nama_jabatan' => 'required',
            'Besaran_uang'  => 'required',
            ]);
        
        $jabatan = new Jabatan();
        $jabatan->Kode_jabatan = $request->Kode_jabatan;
        $jabatan->Nama_jabatan = $request->Nama_jabatan;
        $jabatan->Besaran_uang = $request->Besaran_uang;
        $jabatan->save();
        if ($jabatan->save()) {
            Session::flash('pesan_sukses','Berhasil Menambahkan Data Jabatan');
        }
        else{
            Session::flash('pesan_gagal','Gagal Menambahkan Data Jabatan');
        }
        return redirect('Jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jabatan::find($id);
        return view('FJabatan.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jabatan::find($id);
        return view('FJabatan.edit',compact('data'));
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
            'Kode_jabatan' => 'required',
            'Nama_jabatan' => 'required',
            'Besaran_uang'  => 'required',
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->Kode_jabatan = $request->Kode_jabatan;
        $jabatan->Nama_jabatan = $request->Nama_jabatan;
        $jabatan->Besaran_uang = $request->Besaran_uang;
        $jabatan->save();
        if($jabatan->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Jabatan');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Jabatan');
        }
        return redirect('Jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::find($id)->delete();
        return redirect('Jabatan');
    }
}
