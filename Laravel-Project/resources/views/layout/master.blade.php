<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <title>MandahNet | Dashboard</title> --}}

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset ('AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset ('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

      <!-- Messages Dropdownn Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach($notifPesans as $pesan)
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{ $pesan -> name }}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($pesan->created_at)->diffForHumans() }}</p>
                <p class="text-sm">{{ $pesan -> message }}</p>
              </div>
            </div>
            <div class="dropdown-divider"></div>
          </a>
          <!-- Message End -->
            @endforeach
         
          <a href="pesanmasuk" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach($notifPengajuans as $pengajuan)
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{ $pengajuan -> nama }}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($pengajuan->created_at)->diffForHumans() }}</p>
                <p class="text-sm">{{ $pengajuan -> alamat }}</p>
              </div>
            </div>
            <div class="dropdown-divider"></div>
          </a>
          <!-- Message End -->
            @endforeach
         
          <a href="pengajuanpasang" class="dropdown-item dropdown-footer">Lihat Semua Pengajuan</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" style="text-align: center; display: block;">
      <span class="brand-text font-weight-light" style="display: inline-block;">CV. MANDAH86</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset ('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{explode(' ', Auth::user()->fullname)[0]}} ({{ Auth::user()->user_type }})</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/dashboard" class="nav-link @yield( 'menudashboard' )">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Beranda
                {{-- New Disini --}}
                <span class="right badge badge-danger"></span> 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link  @yield( 'menukontakpelanggan' )">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kontak Pelanggan
                <i class="fas fa-angle-left right"></i>
                {{-- 6 message disini --}}
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/tambahkontakbaru" class="nav-link @yield( 'menutambahkontakbaru' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kontak Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listKontak" class="nav-link  @yield( 'menudalistkontak' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Kontak  @yield( 'menudashboard' )</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" @auth @if(auth()->user()->user_type === 'Super Admin' || auth()->user()->user_type === 'Teknisi') '' @else style="display:none;" @endif @endauth>            <a href="#" class="nav-link @yield( 'menulayanan' )">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Layanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/pakethotspot" class="nav-link @yield( 'menupakethotspot' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paket Hotspot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/paketpppoe" class="nav-link @yield( 'menupaketpppoe' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paket PPPoE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/daftarbandwidth" class="nav-link @yield( 'menudaftarbandwidth' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Bandwidth</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" @auth @if(auth()->user()->user_type === 'Super Admin' || auth()->user()->user_type === 'Keuangan') '' @else style="display:none;" @endif @endauth>
            <a href="#" class="nav-link @yield( 'menulaporan' )">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/laporanharian" class="nav-link @yield( 'menulaporanharian' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporankeuangan" class="nav-link @yield( 'menulaporankeuangan' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Keuangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporanpengeluaran" class="nav-link @yield( 'menulaporanpengeluaran' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Pengeluaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" @auth @if(auth()->user()->user_type === 'Super Admin' || auth()->user()->user_type === 'Teknisi') '' @else style="display:none;" @endif @endauth>
            <a href="#" class="nav-link @yield( 'menunetwork' )">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Network
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/router" class="nav-link @yield( 'menurouters' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Routers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ippool" class="nav-link @yield( 'menuippool' )">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IP Pool</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" @auth @if(auth()->user()->user_type === 'Super Admin' || auth()->user()->user_type === 'Admin') '' @else style="display:none;" @endif @endauth>
            <a href="#" class="nav-link @yield( 'menunotifikasi' )">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Notifikasi
                <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/pengajuanpasang" class="nav-link @yield( 'menupengajuanpasang' )">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengajuan Pasang</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pesanmasuk" class="nav-link @yield( 'menupesanmasuk' )">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pesan Masuk</p>
                    </a>
                </li>
              </li>
            </ul>
          </li>
          <li class="nav-item" @auth @if(auth()->user()->user_type === 'Super Admin' || auth()->user()->user_type === 'Admin') '' @else style="display:none;" @endif @endauth>
            <a href="#" class="nav-link @yield( 'menuupdatehalaman' )">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Update Halaman
                <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('editAlamat') }}" class="nav-link @yield( 'menualamat' )">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Alamat</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('editNomorTelepon') }}" class="nav-link @yield( 'menunomortelepon' )">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nomor Telepon</p>
                    </a>
                </li>
              </li>
            </ul>
          </li>

          <li class="nav-item" @auth @if(auth()->user()->user_type === 'Super Admin') '' @else style="display:none;" @endif @endauth>
            <a href="#" class="nav-link @yield( 'menupengaturan' )">
              <i class="nav-icon fas fa-table"></i>
                <p>
                    Pengaturan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/pengaturanadmin" class="nav-link @yield( 'menupengaturanadmin' )">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengaturan Admin</p>
                    </a>
                </li>
                <!-- Add more sub-menu items if needed -->
            </ul>
          </li>
          <li li class="nav-item" >
            <a href="{{ route('logout') }}" class="nav-link" style="background-color: #dc3545; color: #fff; border-radius: 5px; padding: 5px 10px; text-align: left; display: flex; align-items: center; margin-left: 10px;">
              <i class="fas fa-sign-out-alt"></i>  
                <p> 
                  <i style="margin-right: 13px;"></i>
                  Logout
                </p>
            </a>
          </li>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


<!-- jQuery -->
<script src="{{asset ('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset ('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset ('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset ('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset ('AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset ('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset ('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset ('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset ('AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset ('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset ('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset ('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset ('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('AdminLTE/dist/js/adminlte.js')}}"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="{{asset ('AdminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset ('AdminLTE/dist/js/pages/dashboard.js')}}"></script> --}}

@yield('content')
@yield('scripts')
@stack('scripts')
</body>
</html>
