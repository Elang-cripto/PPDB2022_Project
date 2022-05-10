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
            <h3 class="card-title">Postingan LandingPage</h3>
          </div>
          <form method="post" action="/admin/upd_post/1" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Posting Utama</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Judul Utama">Judul Utama</label>
                                    <input type="email" class="form-control" id="Judul Utama" value="{{ $global2->judul_utama }}" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub Judul</label>
                                    <textarea id="summernote">{{ $global2->judul_sub }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('vendor') }}/arsha/img/{{ $global2->img_utama }}" alt="" width="500px">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">About US</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">About Us</label>
                                    <textarea id="summernote1">{{ $global2->about_us }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('vendor') }}/arsha/img/{{ $global2->img_post1 }}" alt="" width="500px">
                    </div>
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Posting 1</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Judul Utama">Header Pertama</label>
                                    <input type="email" class="form-control" id="Judul Utama" value="{{ $global2->judul_post1 }}" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Body Post</label>
                                    <textarea id="summernote2">{{ $global2->isi_post1 }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Posting 2</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Judul Utama">Header Kedua</label>
                                    <input type="email" class="form-control" id="Judul Utama" value="{{ $global2->judul_post2 }}" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Body Post</label>
                                    <textarea id="summernote3">{{ $global2->isi_post2 }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('vendor') }}/arsha/img/{{ $global2->img_post2 }}" alt="" width="500px">
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