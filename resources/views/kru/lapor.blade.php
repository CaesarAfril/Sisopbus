@extends('layout.layout')
@section('title','Siopbus - Laporan Operasional')
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
    <li class="nav-item active">
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
    <?php $path = Storage::url('public/bus/'.session()->get("foto"));?> 
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sistem Informasi Operasional Bus</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Operasional Armada Bus</h6>
                </div>
                <p>Pada bagian ini, anda dapat memberikan laporan mengenai operasional armada bus ini, dimana anda memilih apakah armada bus ini berjalan, dalam perawatan atau tidak jalan</p>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    <form class="user" method="POST" action="/pilihlapor">
                        @csrf
                        <div class="form-group">
                        <input type="hidden" name="id" value="{{session()->get("id")}}">
                        <div class="form-group">
                            <label class="m-0 font-weight-bold text-primary">Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" required>
                        </div>
                        <div class="form-group">
                        <label class="m-0 font-weight-bold text-primary">Operasi</label>
                        <select class="custom-select form-control" name="operasi">
                            <option hidden>Pilih status bus</option>
                            <option value="Jalan">Jalan</option>
                            <option value="Perawatan">Perawatan</option>
                            <option value="Tidak Jalan">Tidak Jalan</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                        Pilih
                        </button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection