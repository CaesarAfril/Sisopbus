@extends('layout.layout')
@section('title','Siopbus - Dashboard')
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
<li class="nav-item active">
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
    use App\Models\DBU;
    use App\Models\DMF;
    use App\Models\DCHS;
    $path = Storage::url('public/bus/'.session()->get("foto"));?> 
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sistem Informasi Operasional Bus</h1>
        </div>  
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang di Sistem Informasi Operasional Bus</h6>
                </div>
                <p>Didalam sistem ini anda dapat melakukan laporan mengenai perjalanan, mengetahui spesifikasi armada bus, riwayat perjalanan armada bus, serta riwayat perawatan bus.</p>
                <form>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{url($path)}}" alt="">
                        </div>
                        <?php
                            $bus = DBU::find(session()->get("id"));
                            $man = DMF::find($bus->id_man);
                            $chassis = DCHS::find($bus->id_chassis);
                        ?>
                        <div class="col-lg-6 mb-4">
                            <h3 class="m-0 font-weight-bold text-primary">Spesifikasi Armada Bus</h3>
                            <p>
                                Kode Bus        : {{$bus->kode}}<br>
                                Tipe Bodi       : {{$bus->tipe}}<br>
                                Manufaktur      : {{$man->nama}}<br>
                                Tipe Chassis    : {{$chassis->nama}}<br>
                                Tipe Mesin      : {{$chassis->mesin}}<br>
                                Tipe Transmisi  : {{$chassis->jenis_transmisi}} {{$chassis->transmisi}}<br>
                                Tipe Suspensi   : {{$chassis->suspensi}}<br>
                                Tahun Pembuatan : {{$bus->tahun}}<br>
                                Total Kilometer : {{$bus->kilometer}} km<br>      
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection