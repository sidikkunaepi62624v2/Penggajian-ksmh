@extends('layouts.penggajian')

@section('content')
 <br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Akun</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('Pegawai') }}" enctype="multipart/form-data" files="true">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                            <label for="permission" class="col-md-4 control-label">Permission</label>

                            <div class="col-md-6">
            <select class="form-control" name="permission" id="permission" required>
                <option value="Admin">Admin</option>
                <option value="HRD">HRD</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Pegawai">Pegawai</option>
            </select>
                    @if ($errors->has('permission'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permission') }}</strong>
                                    </span>
                                @endif
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Pegawai</div>
                <div class="panel-body">

            <div class="form-group{{ $errors->has('Nip') ? ' has-error' : '' }}">
                            <label for="Nip" class="col-md-4 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP</label>
                            <div class="col-md-6">
                                <input id="Nip" type="text" class="form-control" name="Nip" value="{{ old('Nip') }}" required autofocus>

                                @if ($errors->has('Nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br><br>
                        <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</label>

                            <div class="col-md-6">
            <select class="form-control" name="jabatan_id">
            @foreach($jabatan as $data)
                <option value="{{$data->id}}">{{$data->Nama_jabatan}}</option>
            @endforeach
            </select>

                                @if ($errors->has('jabatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br><br>
                        <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
                            <label for="Photo" class="col-md-4 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Golongan</label>

                            <div class="col-md-6">
            <select class="form-control" name="golongan_id">
            @foreach($golongan as $data)
                <option value="{{$data->id}}">{{$data->Nama_golongan}}</option>
            @endforeach
            </select>

                                @if ($errors->has('golongan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br><br>
                         <div class="form-group{{ $errors->has('Photo') ? ' has-error' : '' }}">
                            <label for="Photo" class="col-md-4 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Photo</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="Photo" value="{{ old('Photo') }}" required>

                                @if ($errors->has('Photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
