<!DOCTYPE html>
<html>
@include('template.admin.head')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bantuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Silahkan hubungi admin kami melalui <b>Whatsapp</b> yang tertera dibawah.
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary" target="_blank" href="https://wasap.at/Hpxrq6">Hubungi Admin</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Tutup Modal -->
  <div class="wrapper">
    
    @include('template.admin.navbar')
    
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-info elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link navbar-white text-light navbar-brand-logo">
        {{-- <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
        <br>
      </a>
      
      @include('template.admin.sidebar')
    </aside>
    
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('body-title')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@yield('breadcumb-1')</a></li>
                <li class="breadcrumb-item active">@yield('breadcumb-2')</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="#">Cleo Web Admin</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.5 Alpha
      </div>
    </footer>
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  @include('template.admin.scripts')
</body>
</html>
