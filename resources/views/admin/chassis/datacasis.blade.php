@extends('layout.layout')
@section('title','Siopbus - Daftar Chassis')
@section('sidebar')
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

    <li class="nav-item">
        <a class="nav-link" href="/rute">
        <i class="fas fa-fw fa-globe"></i>
        <span>Daftar Rute Bus</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/daftaradmin">
        <i class="fas fa-fw fa-user"></i>
        <span>Daftar Admin</span></a>
    </li>

    <li class="nav-item active">
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
    <?php 
    use App\Models\DMF;
    $path = Storage::url('public/profil/'.session()->get("foto"));
    ?> 
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-2 text-gray-800">Daftar Chassis Bus</h1>
                <p class="mb-4">Pada halaman ini anda dapat melihat daftar chassis bus serta dapat menambahkan data armada bus kedalam sistem ini.</p>
                <a href="/tambahchassis"><button class="btn btn-primary">Tambah Chassis Bus</button></a><br>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Manufaktur</th>
                                <th>Jenis Chassis</th>
                                <th>Mesin</th>
                                <th>Jenis Transmisi</th>
                                <th>Transmisi</th>
                                <th>Jenis Suspensi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama Manufaktur</th>
                                <th>Jenis Chassis</th>
                                <th>Mesin</th>
                                <th>Jenis Transmisi</th>
                                <th>Transmisi</th>
                                <th>Jenis Suspensi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $a)
                            <tr>
                                <td>{{$a->id}}</th>
                                <?php
                                    $nama = DMF::find($a->id_man);
                                ?>
                                <td>{{$nama->nama}}</td>
                                <td>{{$a->nama}}</td>
                                <td>{{$a->mesin}}</td>
                                <td>{{$a->jenis_transmisi}}</td>
                                <td>{{$a->transmisi}}</td>
                                <td>{{$a->suspensi}}</td>
                                <td><a href ='/hapus_chassis/{{$a->id}}'><button class="btn btn-danger btn-icon-split btn-sm" style="padding: 5px 10px 5px;"><i class="fas fa-trash"></i></button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection