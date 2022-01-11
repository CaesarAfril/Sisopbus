@extends('layout.layout')
@section('title','Siopbus - Riwayat Perawatan')
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
        <a class="nav-link" href="/laporan">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Laporan Operasional</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/perjalanan">
        <i class="fas fa-fw fa-calendar"></i>
        <span>Riwayat Perjalanan Armada</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/perawatan">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Riwayat Perawatan Armada</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection
@section('php')
    <?php
    use App\Models\DLPR;
    use App\Models\DLWT;
    $path = Storage::url('public/bus/'.session()->get("foto"));?> 
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Riwayat Perawatan Armada Bus</h1>
        <p class="mb-4">Pada halaman ini anda dapat melihat seluruh riwayat perawatan dari armada bus ini.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <th>Status</th>
                                <th>Bagian</th>
                                <th>Jenis Perawatan</th>
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <th>Status</th>
                                <th>Bagian</th>
                                <th>Jenis Perawatan</th>
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                            <tr> 
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->status}}</td>
                                    @php $laporan = DLWT::where('id_laporan',$data->id)->first(); @endphp
                                    <td>{{$laporan->bagian}}</td>
                                    <td>{{$laporan->jenis}}</td>
                                    <td>{{$laporan->tanggal}}</td>
                                    <td>{{$laporan->keterangan}}</td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection