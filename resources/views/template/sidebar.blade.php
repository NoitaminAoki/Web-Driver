<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">
        @auth
        {{Auth::user()->name}}
        @endauth
      </a>
    </div>
  </div>
  
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        {{-- <li class="nav-header">Driver</li> --}}
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Beranda
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('driver')}}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Profil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('driver/project')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat Laporan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Lainnya</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Pengaturan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kembali ke Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bantuan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda ingin keluar ?')" style="display: none;">
                  @csrf
                </form>
                <i class="far fa-circle nav-icon"></i>
                <p>Keluar</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->