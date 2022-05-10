@extends('layout.main')

@section('title', $header)

@section('sidebar')
    @include('admin.side')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $header }}</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pendaftar</a></li>
                <li class="breadcrumb-item active">{{ $lokasi }}</li>
              </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Identitas Lembaga</h3>
          </div>
          <form method="post" action="/admin/upd_setting/1" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lembaga</label>
                    <input type="text" name="app_nm_lembaga" class="form-control" value="{{ $global->app_nm_lembaga }}" placeholder="Nama Lembaga">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat Lembaga</label>
                    <input type="text" name="app_almt_lembaga" class="form-control" value="{{ $global->app_almt_lembaga }}" placeholder="Alamat Lembaga">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telp Lembaga</label>
                    <input type="text" name="app_telp_lembaga" class="form-control" value="{{ $global->app_telp_lembaga }}" placeholder="0336 xxxxxx">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Kepala</label>
                    <input type="text" name="app_nmks_lembaga" class="form-control" value="{{ $global->app_nmks_lembaga }}" placeholder="Nama Kepala">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">NPSN</label>
                    <input type="text" name="app_npsn_lembaga" class="form-control" value="{{ $global->app_npsn_lembaga }}" placeholder="Nomer Pokok Sekolah Nasional">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tahun PPDB</label>
                    <input type="text" name="app_tahun" class="form-control" value="{{ $global->app_tahun }}" placeholder="Nomer Pokok Sekolah Nasional">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>

@endsection