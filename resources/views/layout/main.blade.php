@include('layout.head')

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('vendor') }}/dist/img/kemenag.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('layout.nav')

  @section('sidebar')
  @show

  @yield('content')

@include('layout.foot')
