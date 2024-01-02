@extends('layout.master')
@section('content')
@section('menunetwork')
active
@endsection
@section('menurouters')
active
@endsection

<title>MandahNet | Router</title>

<link rel="stylesheet" href="css/button.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Router</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                        <li class="breadcrumb-item active">Router</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="input-group input-group-sm" style="width: 300px;">

                                    <form action="" class="form-inline" method="GET">

                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value="{{ old('keyword', $keyword) }}">
                                        
                                        <div class="input-group-append">
                                            <button id="searchRouter" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        {{-- <input type="reset" name= "Reset" value="Reset" href="/cobarouter"> --}}
                                    </form>
                                    <a href="/router" style="margin: 3px" id="tombolSilang"  style="display: block;" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                    </a>
                                </div>
                                <div class="float-sm-right">
                                    <a href="tambahrouter" class="btn btn-success">Tambah Router</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Router</th>
                                            <th>IP Address</th>
                                            <th>Username</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($routers as $router)
                                            <tr>
                                                <td>{{ $router->name}}</td>
                                                <td>{{ $router->ip_address }}</td>
                                                <td>{{ $router->username }}</td>
                                                <td>{{ $router->deskripsi}}</td>
                                                <td>{{ $router->status }}</td>
                                                <td>
                                                    <a href="{{ route('editrouter', $router->id) }}" class="edit-button">Edit</a>
                                                    <a href="{{ route('deleterouter', $router->id) }}" class="hapus-button">Hapus</a>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $routers -> links() }}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Add your content here -->
</div>
@endsection

@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Script untuk menampilkan SweetAlert setelah berhasil mengedit admin
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
</script>
@endsection
