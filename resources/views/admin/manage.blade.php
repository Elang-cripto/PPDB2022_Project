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
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fa fa-user-plus"></i> Tambah
                                </button>
                                <br><br>
                            <table id="userlist" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $baca)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img class="img-circle img-bordered-sm" src="{{ asset('vendor/dist/img/'.$baca->foto) }}" alt="foto" height="50" width="50">
                                    </td>
                                    <td>{{ $baca->name }}</td>
                                    <td>{{ $baca->email}}</td>
                                    <td>{{ $baca->role }}</td>
                                    <?php 
                                    if ($baca->status=='aktif') {
                                        $warna = 'badge badge-success';
                                    } else {
                                        $warna = 'badge badge-danger';
                                    }
                                    ?>
                                    <td><span class="{{ $warna }}">{{ $baca->status }}</span></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ md5($baca->id) }}">
                                            <i class="fa fa-edit"></i></button>
                                        <a href="/admin/del_user/{{ Crypt::encryptString($baca->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash" ></i></a>
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
              <h4 class="modal-title">Tambah User admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form name="form_tambah" method="post" action="/admin/tambah_user" enctype="multipart/form-data">
                @csrf
              <div class="modal-body">
                <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nama" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-4 col-form-label">Username</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" placeholder="Username" required>
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Level" class="col-sm-4 col-form-label">Level</label>
                  <div class="col-sm-8">
                    <select type="text" name="role" id="role" class="form-control select" required>
                      <option value="" {{ (old('role') === "") ? 'selected' :'' }}>--- Pilih role ---</option>
                      <option value="admin" {{ (old('role') === "admin") ? 'selected' :'' }}>ADMIN</option>
                      <option value="panitia" {{ (old('role') === "panitia") ? 'selected' :'' }}>PANITIA</option>
                      <option value="mgm" {{ (old('role') === "mgm") ? 'selected' :'' }}>MGM</option>
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
                <form name="form_edit" method="post" action="/admin/update_user/{{ $change->id }}" enctype="multipart/form-data" onsubmit="return cekform()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $change->name }}" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="username" id="username" value="{{ $change->username }}" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" value="{{ $change->email }}" placeholder="Email" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="password_old" id="password" value="{{ $change->password }}">
                                <input type="password" class="form-control" name="password_new" id="password" placeholder="Isi jika ganti">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-4 col-form-label">Level</label>
                            <div class="col-sm-8">
                                <select type="text" name="role" id="role" class="form-control select" required>
                                <option value="" {{ ($change->role === "") ? 'selected' :'' }}>--- Pilih role ---</option>
                                <option value="admin" {{ ($change->role === "admin") ? 'selected' :'' }}>ADMIN</option>
                                <option value="panitia" {{ ($change->role === "panitia") ? 'selected' :'' }}>PANITIA</option>
                                <option value="mgm" {{ ($change->role === "mgm") ? 'selected' :'' }}>MGM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                            <select type="text" name="status" id="status" class="form-control select" required>
                                <option value="aktif" {{ ($change->status === "aktif") ? 'selected' :'' }}>AKTIF</option>
                                <option value="nonaktif" {{ ($change->status === "nonaktif") ? 'selected' :'' }}>NON AKTIF</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <p class="text-danger">Jika ada perubahan password silahkan isi kolom password jika tidak maka kosongkan</p>
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