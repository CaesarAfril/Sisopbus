@extends('layout.layout')
@section('title', 'Siopbus - Laporan Operasional')
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
    <li class="nav-item active">
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
    <?php 
    use App\Models\DLPJ;
    use App\Models\DLPR;
    use App\Models\DLWT;
    use App\Models\DBU;
    use App\Models\DRT;
    $path = Storage::url('public/profil/' . session()->get('foto')); ?>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-2 text-gray-800">Laporan Operasional Armada Bus</h1>
                <p class="mb-4">Pada halaman ini anda dapat melihat laporan operasional armada bus.</p>
                <p>Untuk mencetak pdf:<br>
                    1. Jika ingin mencetak keseluruhan data, klik cetak .pdf tanpa memilih tanggal.<br>
                    2. Jika ingin mencetak dalam tanggal tertentu, pilih tanggal lalu klik cetak .pdf.
                </p>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="col-12 col-sm-12">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Operasional</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">Detail
                                                Operasional Perjalanan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                                href="#custom-tabs-four-messages" role="tab"
                                                aria-controls="custom-tabs-four-messages" aria-selected="false">Detail
                                                Operasional Perawatan</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-home-tab">
                                            @include('admin.tabeldata.operasional')
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            @include('admin.tabeldata.perjalanan')
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-messages-tab">
                                            @include('admin.tabeldata.perawatan')
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
