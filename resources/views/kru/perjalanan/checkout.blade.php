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
    <?php 
    use App\Models\DLPR;
    use App\Models\DLPJ;
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
                <h6 class="m-0 font-weight-bold text-primary">Laporan Operasional Armada Bus</h6>
                </div>
                <p>Input data ini setelah bus selesai melakukan perjalanan!</p>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    <?php
                        $id = DLPR::where([['status',"Dalam Perjalanan"],['id_bus',session()->get("id")]])->first();
                        $iddet = DLPJ::where('id_laporan',$id->id)->first();
                    ?>
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Perjalanan Bus</h6>
                    <form class="user" method="POST" action="/endjalan">
                        @csrf
                        <input type="hidden" name="laporan" value="{{$id->id}}">
                        <input type="hidden" name="id" value="{{$iddet->id}}">
                        <input type="hidden" name="bus" value="{{session()->get("id")}}">
                        <div class="form-group">
                            <label class="m-0 font-weight-bold text-primary">Total Perjalanan</label>
                            <input type="number" class="form-control" name="kilometer" placeholder="Total kilometer" required>
                        </div>
                        <div class="form-group">
                            <label class="m-0 font-weight-bold text-primary">Konsumsi Bahan Bakar</label>
                            <input type="number" class="form-control" name="konsumsi" placeholder="Total pengeluaran bahan bakar" required>
                        </div>
                        <div class="form-group">
                            <label class="m-0 font-weight-bold text-primary">Kondisi Ban</label>
                            <select class="custom-select form-control" name="ban">
                                <option hidden>Kondisi ban</option>
                                <option value="Prima">Prima</option>
                                <option value="Baik">Baik</option>
                                <option value="Butuh Diganti">Butuh Diganti</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="m-0 font-weight-bold text-primary">Kondisi Bus</label>
                            <select class="custom-select form-control" name="kondisi">
                                <option hidden>Kondisi bus</option>
                                <option value="Prima">Prima</option>
                                <option value="Baik">Baik</option>
                                <option value="Butuh Perbaikan">Butuh Perbaikan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                        Selesai Perjalanan
                        </button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection