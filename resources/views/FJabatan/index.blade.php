@extends('layouts.penggajian')

@section('content')
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                @if (Auth::guest())
                    <img class="img-responsive" alt="" src="{{url('penggajian/img/lock.png')}}">
                    <div class="intro-text">
                        <span class="name">SELAMAT DATANG</span>
                        <hr class="star-light">
                        <span class="skills">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</span>
                    </div>
                    @else
                    <img class="img-responsive" alt="" src="{{url('penggajian/img/profile.png')}}">
                    <div class="intro-text">
                        <span class="name">JABATAN</span>
                        <hr class="star-light">
                        <span class="skills"> <b>{{ Auth::user()->name }}</b> , Anda Memilih Jabatan</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
<br>
	 <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
            @if(Session::has('pesan_sukses'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('pesan_sukses')}}
                  </div>
                @elseif(Session::has('pesan_gagal'))
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('pesan_gagal')}}
                  </div>
                @endif
              </div>
 &nbsp;&nbsp;&nbsp;<a href="{{url('Jabatan/create')}}" class="btn btn-primary">Input Data Jabatan&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <center><h2>Daftar Jabatan</h2></center>
                    <hr>
                  </div>
                 
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Kode Jabatan</center></p></th>
                          <th><p class="center"><center>Nama Jabatan</center></p></p></th>
                          <th><p class="center"><center>Besaran Uang</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php $no=1; ?>
                         @foreach ($jabatan as $data)
                             <tr>
                                 <th><center>{{ $no++ }}</center></th>
                                 <th><center>{{ $data->Kode_jabatan }}</center></th>
                                 <th><center>{{ $data->Nama_jabatan }}</center></th>
                                 <th><center><?php echo 'Rp.'. number_format($data->Besaran_uang, 2,",","."); ?></center></th>
                                 <th><a href="{{url('Jabatan',$data->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></th>
                                 <th><a title="Edit" href="{{route('Jabatan.edit',$data->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></th>
                                 <th>
                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                  @include('modals.del', [
                                    'url' => route('Jabatan.destroy', $data->id),
                                    'model' => $data
                                  ])
                                 </th>
                             </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection