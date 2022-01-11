@extends('layout.layout')
@section('title','Siopbus - Riwayat Perjalanan')
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

    <li class="nav-item active">
        <a class="nav-link" href="/perjalanan">
        <i class="fas fa-fw fa-calendar"></i>
        <span>Riwayat Perjalanan Armada</span></a>
    </li>

    <li class="nav-item">
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
    use App\Models\DRT;
    use App\Models\DLPJ;
    $path = Storage::url('public/bus/'.session()->get("foto"));
    ?> 
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Riwayat Perjalanan Armada Bus</h1>
        <p class="mb-4">Pada halaman ini anda dapat melihat seluruh riwayat perjalanan dari armada bus ini.</p>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Rute</th>
                                <th>Kilometer</th>
                                <th>Konsumsi Bahan Bakar</th>
                                <th>Kondisi Bus</th>
                                <th>Kondisi Ban</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Rute</th>
                                <th>Kilometer</th>
                                <th>Konsumsi Bahan Bakar</th>
                                <th>Kondisi Bus</th>
                                <th>Kondisi Ban</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <?php
                                $laporan = DLPJ::where('id_laporan',$data->id)->get();   
                                ?>
                                <td>{{$data->tanggal}}</td>
                                @foreach ($laporan as $laporan)
                                    <?php
                                    $rute = DRT::where('id',$laporan->id_rute)->first();
                                    ?>
                                    <td>{{$rute->kode}}</td>
                                    <td>{{$laporan->kilometer}}</td>
                                    <td>{{$laporan->konsumsi}}</td>
                                    <td>{{$laporan->kondisi}}</td>
                                    <td>{{$laporan->ban}}</td>
                                @endforeach
                                <td>{{$data->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection