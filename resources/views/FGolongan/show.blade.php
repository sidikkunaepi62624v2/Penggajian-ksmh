@extends('layouts.penggajian')

@section('content')
          <br><br><br><br><br><br>
                  <div class="x_title">
                    <center><h2>Detail Data Golongan</h2></center>
                  </div>
                    <br />
                    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Kode Golongan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="{{$data->Kode_golongan}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Golongan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="{{$data->Nama_golongan}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Besaran Uang</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="{{$data->Besaran_uang}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('Golongan')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
            
    
@endsection
