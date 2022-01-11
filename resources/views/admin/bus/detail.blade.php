@extends('layout.layout')
@section('title','Siopbus - Detail Bus')
@section('sidebar')
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
        <img src="../assets/img/logo.png" width="50px">
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

    <li class="nav-item active">
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
    use App\Models\DMF;
    use App\Models\DCHS;
    $path = Storage::url('public/profil/'.session()->get("foto"));?> 
@endsection
@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            @php
                                $foto = Storage::url('public/bus/'.$bus->foto);
                                $man = DMF::find($bus->id_man);
                                $chassis = DCHS::find($bus->id_chassis);
                            @endphp
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{url($foto)}}" alt="">
                        </div>
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