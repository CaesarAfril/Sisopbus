@extends('layout.layout')
@section('title','Siopbus - Daftar Rute')
@section('sidebar')
<!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
        <img src="assets/img/logo.png" width="50px">
        </div>
        <div class="sidebar-brand-text mx-3">Siopbus</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/operasional">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Laporan Operasional</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/daftarbus">
        <i class="fas fa-fw fa-car"></i>
        <span>Daftar Armada Bus</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/rute">
        <i class="fas fa-fw fa-globe"></i>
        <span>Daftar Rute Bus</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/daftaradmin">
        <i class="fas fa-fw fa-user"></i>
        <span>Daftar Admin</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/datachassis">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Daftar Chassis</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection
@section('profil')
    <a class="dropdown-item" href="/profiladmin">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
    </a>
    <div class="dropdown-divider"></div>
@endsection
@section('php')
    <?php $path = Storage::url('public/profil/'.session()->get("foto"));?> 
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
        <h1 class="h3 mb-2 text-gray-800">Daftar Rute Bus</h1>
        <p class="mb-4">Pada halaman ini anda dapat melihat daftar rute bus dan menambahkan data rute bus kedalam sistem ini.</p>
        <a href="/tambahrute"><button class="btn btn-primary">Tambah Rute Baru</button></a><br>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Rute</th>
                                <th>Kode Rute</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Jalur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Rute</th>
                                <th>Kode Rute</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Jalur</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $a)
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>{{$a->kode}}</td>
                                <td>{{$a->kota_asal}}</td>
                                <td>{{$a->kota_tujuan}}</td>
                                <td>{{$a->jalur}}</td>
                                <td><button class="btn btn-warning btn-icon-split btn-sm" style="padding: 5px 10px 5px;" data-toggle="modal" data-target="#exampleModalCenter" data-rute="{{$a->id_rute}}"><i class="fas fa-edit" ></i></button>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script>
    // $('#exampleModalCenter').on('show', function(e){
    //     var link = e.relatedTarget(),
    //         modal = $(this),
    //         rute = link.data("rute");

    //         modal.find("#rute").val(rute);
    // });
</script>
@endsection