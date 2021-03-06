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
                    <li class="breadcrumb-item"><a href="#">PPDB</a></li>
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
                    <div class="card">
                    <div class="card-header">
                        <table id="datasiswa" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>No Register</th>
                            <th>Nama</th>
                            <th>Tmpt, Tgl Lahir</th>
                            <th>Asal Sekolah</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($data as $baca)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $baca->no_reg }}</td>
                                <td>{{ $baca->nama }}</td>
                                <td>{{ $baca->tmp_lahir}}, {{ $baca->tgl_lahir }}</td>
                                <td>{{ $baca->skl_asal }}</td>
                                <td>
                                    <a href="/admin/edit/{{ Crypt::encryptString($baca->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="/admin/delete/{{ Crypt::encryptString($baca->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash" ></i></a>
                                    <button type="button" class="btn btn-info btn-sm"><i class="fa fa-print"></i></button>
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
@endsection