@extends('layouts.penggajian')

@section('content')
 <br><br><br><br><br><br>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  @if(!empty($errors->first()))
                      <div class="alert alert-danger">{!! $errors->first() !!}</div>
                    @endif
                  </div>
                  <div class="x_title">
                    <center><h2>Input Data Tunjangan</h2></center>
                  </div>
                    <br />
    {!! Form::open(['url' => 'Tunjangan', 'class' => 'form-horizontal form-label-left']) !!}
    <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Kode Tunjangan ', 'Kode Tunjangan  ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::number('Kode_tunjangan',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
          </div>
      </div>
     <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            {!! Form::label('Jabatan', 'Jabatan ') !!}
             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="jabatan_id">
            @foreach($jabatan as $data)
                <option value="{{$data->id}}">{{$data->Nama_jabatan}}</option>
            @endforeach
            </select>
        </div>
    </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Golongan ', 'Golongan ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="golongan_id">
            @foreach($golongan as $data)
                <option value="{{$data->id}}">{{$data->Nama_golongan}}</option>
            @endforeach
            </select>
        </div>
      </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Status ', 'Status ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
             <select class="form-control" name="Status" id="Status" required>
                <option value="Belum Nikah">Belum Nikah</option>
                <option value="Nikah">Nikah</option>
                <option value="Janda">Janda</option>
                <option value="Duda">Duda</option>
            </select>
          </div>
      </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Jumlah Anak ', 'Jumlah Anak  ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::number('Jumlah_anak',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
          </div>
      </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Besaran Uang', 'Besaran Uang ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::number('Besaran_uang',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}
          </div>
      </div>
    {!! Form::close() !!}

@endsection