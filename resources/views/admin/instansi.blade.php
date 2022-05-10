@extends('layout.main')

@section('title', $header)

@section('sidebar')
    @include('admin.side')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fa fa-user-plus"></i> Tambah
                        </button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-import">
                            <i class="fa fa-upload"></i> Upload
                        </button>
                        <a href="https://referensi.data.kemdikbud.go.id/index11.php" target="_blank">
                          <button type="button" class="btn btn-warning">
                              <i class="fa fa-search-location"></i> Cari Sekolah
                          </button>
                        </a>
                                <br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <table id="instansi" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NPSN</th>
                                <th>Nama Lembaga</th>
                                <th>Alamat</th>
                                <th>L</th>
                                <th>P</th>
                                <th>Jml</th>
                                <th style="width:10%">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $baca)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $baca->npsn }}</td>
                                    <td>{{ $baca->lembaga }} <span class="badge badge-warning right">{{ $baca->status }}</span></td>
                                    <td>{{ $baca->alamat}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ md5($baca->id) }}">
                                            <i class="fa fa-edit"></i></button>
                                        <a href="/admin/del_instansi/{{ Crypt::encryptString($baca->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash" ></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- =============================== modal tambah =============================== -->
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Lembaga Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form name="form_tambah" method="post" action="/admin/add_instansi" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group row">
                  <label for="npsn" class="col-sm-4 col-form-label">NPSN</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control @error('npsn') is-invalid @enderror" name="npsn" id="npsn" value="{{ old('npsn') }}" placeholder="NPSN Sekolah" required>
                    @error('npsn')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lembaga" class="col-sm-4 col-form-label">Nama Lembaga</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control " name="lembaga" id="lembaga" value="{{ old('lembaga') }}" placeholder="Lembaga Asal" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Email" required>
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="kelurahan" class="col-sm-4 col-form-label">Kelurahan</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="{{ old('kelurahan') }}" placeholder="Desa/Kelurahan" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="status" class="col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8">
                    <select type="text" name="status" id="status" class="form-control" required>
                      <option value="" {{ (old('status') === "") ? 'selected' :'' }}>--- Pilih ---</option>
                      <option value="NEGERI" {{ (old('status') === "NEGERI") ? 'selected' :'' }}>NEGERI</option>
                      <option value="SWASTA" {{ (old('status') === "SWASTA") ? 'selected' :'' }}>SWASTA</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- =============================== modal Import =============================== -->
 
    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="/admin/import_instansi" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <button type="button" class="btn btn-warning btn-sm" onclick="window.location.href='{{ asset('vendor') }}/format/format_upload_sdmi.xlsx'"><i class="fa fa-download"></i> Download Format</button>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="name" class="col-sm-4 col-form-label">Nama</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- =============================== modal Edit =============================== -->
    {{-- @php $no = 1; @endphp --}}
    @foreach ($data as $change)
    <div class="modal fade" id="modal-edit-{{ md5($change->id) }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form name="form_tambah" method="post" action="/admin/upd_instansi/{{ $change->id }}" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group row">
                      <label for="npsn" class="col-sm-4 col-form-label">NPSN</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('npsn') is-invalid @enderror" name="npsn" id="npsn" value="{{ $change->npsn  }}" placeholder="NPSN Sekolah" required>
                        @error('npsn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lembaga" class="col-sm-4 col-form-label">Nama Lembaga</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control " name="lembaga" id="lembaga" value="{{ $change->lembaga }}" placeholder="Lembaga Asal" required>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $change->alamat  }}" placeholder="Email" required>
                        </div>
                      </div>
                    <div class="form-group row">
                      <label for="kelurahan" class="col-sm-4 col-form-label">Kelurahan</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="{{ $change->kelurahan }}" placeholder="Desa/Kelurahan" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="status" class="col-sm-4 col-form-label">Status</label>
                      <div class="col-sm-8">
                        <select type="text" name="status" id="status" class="form-control" required>
                          <option value="" {{ ($change->status === "") ? 'selected' :'' }}>--- Pilih ---</option>
                          <option value="NEGERI" {{ ($change->status === "NEGERI") ? 'selected' :'' }}>NEGERI</option>
                          <option value="SWASTA" {{ ($change->status === "SWASTA") ? 'selected' :'' }}>SWASTA</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
@endsection