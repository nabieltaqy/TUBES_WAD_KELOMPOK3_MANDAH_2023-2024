

@extends('layout.master')
@section('content')
@section('menunetwork')
active
@endsection
@section('menuippool')
active
@endsection
<link rel="stylesheet" href="css/button.css">
<title>MandahNet | Daftar IP Pool</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">IP Pool</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                        <li class="breadcrumb-item active">IP Pool</li>
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
                                            <button id="searchAdmin" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        {{-- <input type="reset" name= "Reset" value="Reset" href="/pengaturanadmin"> --}}
                                    </form>
                                    <a href="/ippooln" style="margin: 3px" id="tombolSilang"  style="display: block;" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                    </a>
                                </div>
                                <a href="/tambahippool" class="btn btn-success btn-sm">Pool Baru</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Pool</th>
                                            <th>Rentang IP</th>
                                            <th>Routers</th>
                                            <th>Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inipool as $pool)
                                            <tr>
                                                <td>{{ $pool->pool_name }}</td>
                                                <td>{{ $pool->range_ip }}</td>
                                                <td>{{ $pool->routers }}</td>
                                                <td>
                                                  <a href="{{ route('editippool', $pool->id) }}" class="edit-button">Edit</a>
                                                  <a href="{{ route('deleteippool', $pool->id) }}" class="hapus-button">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $inipool -> links() }}
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
