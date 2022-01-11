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
                <p>Pada bagian ini, anda dapat memberikan laporan mengenai operasional armada bus ini, dimana anda memilih apakah armada bus ini berjalan, dalam perawatan atau tidak jalan</p>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    <?php
                        $id = DLPR::where([['status',"0"],['id_bus',session()->get("id")]])->first();
                    ?>
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Perjalanan Bus</h6>
                    <form class="user" method="POST" action="/insertjalan">
                        @csrf
                        <input type="hidden" name="id" value="{{$id->id}}">
                        <div class="form-group">
                            <label class="m-0 font-weight-bold text-primary">Rute Perjalanan</label>
                        <select class="custom-select form-control" name="rute">
                            <option hidden>Pilih Rute</option>
                            @foreach ($data as $a)
                            <option value="{{$a->id}}">{{$a->kode}} {{$a->kota_asal}}-{{$a->kota_tujuan}} Via {{$a->jalur}}</option>    
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                        Mulai Perjalanan
                        </button>  
                    </form>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-0 text-gray-800">Informasi Rute</h1>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Rute</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Jalur</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kode Rute</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Jalur</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $a)
                            <tr>
                                <td>{{$a->kode}}</td>
                                <td>{{$a->kota_asal}}</td>
                                <td>{{$a->kota_tujuan}}</td>
                                <td>{{$a->jalur}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection