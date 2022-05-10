@extends('layout.main')

@section('title', $header)

@section('sidebar')
    @include('admin.side')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
          <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $header }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{ $lokasi }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <?php
            $jabatan = Auth::user()->role;
            $nama = Auth::user()->name;
            $foto = Auth::user()->foto;
            ?>
            <div class="widget-user-header bg-primary">
              <h3 class="widget-user-username"><b>{{ strtoupper($nama); }}</b></h3>
              <h5 class="widget-user-desc"><b> === {{ strtoupper($jabatan);  }} === </b></h5>
            </div>
            <div class="widget-user-image">

              <img class="img-circle elevation-2" src="{{ asset('vendor/dist/img/'.$foto) }}" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="card-body text-center">
                  <h6>
                    Selamat Datang <b>{{ strtoupper($nama); }}</b>, anda adalah <b>{{ strtoupper($jabatan);  }}</b>.<br>
                    Selamat menggunakan Aplikasi PPDB Online ini. Aplikasi ini membantu anda dalam managemen Data Sekolah. <br>
                    Aplikasi ini adalah Aplikasi Penerimaan Peserta Didik Baru dalam membantu panitia melakukan Monitoring Perkembangan Data Terkini dan RealTime <br><br>
                    <b>Salam Satu Data</b>
                  </h6>
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>JUMLAH PENDAFTAR</p>
                  <h3>{{ $db_aktif }}</h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-warning">
                <div class="inner">
                  <p>PENDAFTAR RESIDU</p>
                  <h3>{{ $db_residu }}</h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="/admin/residu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <p>PENDAFTAR VALID</p>
                  <h3>{{ $db_valid }}</h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="/admin/valid" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>PENDAFTAR INVALID</p>
                  <h3>{{ $db_invalid }}</h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="/admin/invalid" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Left col -->

      <section class="col-lg-6 connectedSortable">
          <!-- DIRECT CHAT -->
          <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                  <h3 class="card-title">Direct Chat</h3>
                  <div class="card-tools">
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                          <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Alexander Pierce</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="{{ asset('vendor') }}/dist/img/user1-128x128.jpg" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                          Is this template really for free? That's unbelievable!
                          </div>
                          <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                      <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="{{ asset('vendor') }}/dist/img/user1-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      Working with AdminLTE on a great new app! Wanna join?
                      </div>
                      <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="{{ asset('vendor') }}/dist/img/user3-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      I would love to.
                      </div>
                      <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  </div>
                  <!--/.direct-chat-messages-->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <form action="#" method="post">
                  <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control" disabled>
                      <span class="input-group-append">
                      <button type="button" class="btn btn-primary" disabled>Send</button>
                      </span>
                  </div>
                  </form>
              </div>
              <!-- /.card-footer-->
          </div>
          <!--/.direct-chat -->
      </section>
      <!-- /.Left col -->

      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-6 connectedSortable">
      <!-- TO DO List -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                  </h3>

                  <div class="card-tools">
                  {{-- <ul class="pagination pagination-sm">
                      <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                      <li class="page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul> --}}
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <ul class="todo-list" data-widget="todo-list">
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo1" id="todoCheck1">
                        <label for="todoCheck1"></label>
                        </div>
                        <!-- todo text -->
                        <span class="text">Design a nice theme</span>
                        <!-- Emphasis label -->
                        <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                        </div>
                    </li>
                    <li>
                        <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                        <label for="todoCheck2"></label>
                        </div>
                        <span class="text">Make the theme responsive</span>
                        <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                        <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                        </div>
                    </li>
                    <li>
                        <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo3" id="todoCheck3">
                        <label for="todoCheck3"></label>
                        </div>
                        <span class="text">Let theme shine like a star</span>
                        <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                        <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                        </div>
                    </li>
                  </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                  <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
              </div>
          </div>
          <!-- /.card -->
      </section>
      <!-- right col -->

    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection