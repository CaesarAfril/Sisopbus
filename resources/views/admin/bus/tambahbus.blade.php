@extends('layout.layout')
@section('title','Siopbus - Tambah bus')
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
    <?php $path = Storage::url('public/profil/'.session()->get("foto"));?> 
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Sistem Informasi Operasional Bus</h1>
    </div>
  
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah data bus</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="post" action="/insertbus" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <div class="col-lg-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control" name="kode" placeholder="kode" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="rpass" placeholder="Repeat Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control" name="bodi" placeholder="Jenis Body" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 mb-3 mb-sm-0">
                                <select class="custom-select form-control" name="manufaktur" id="manufaktur" required>
                                    <option hidden>Silahkan Pilih Manufaktur</option>
                                    @foreach ($data as $a)
                                    <option value="{{$a->id}}">{{$a->nama}}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 mb-3 mb-sm-0">
                                <select class="custom-select form-control" name="chassis" id="chassis" required>
                                    <option hidden>Silahkan Pilih Chassis Bus</option>
                                    <option value="">Pilih Chassis</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control" name="tahun" placeholder="Tahun" required>
                            </div>
                        </div>
                        <span>Foto bus :</span><br>
                        <div class="form-group row">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto" required>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    <button class="btn btn-primary btn-user btn-block">
                        Simpan
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
    //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
    //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
    $('select[name="manufaktur"]').on('change', function(){
    // kita buat variable provincedid untk menampung data id select province
        let idman = $(this).val();
    //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
        if(idman){
    // jika di temukan id nya kita buat eksekusi ajax GET
            jQuery.ajax({
    // url yg di root yang kita buat tadi
            url:"/sasis/"+idman,
    // aksion GET, karena kita mau mengambil data
            type:'GET',
    // type data json
            dataType:'json',
    // jika data berhasil di dapat maka kita mau apain nih
            success:function(data){
    // jika tidak ada select dr provinsi maka select kota kososng / empty
            $('select[name="chassis"]').empty();
    // jika ada kita looping dengan each
            $.each(data, function(key, value){
    // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
            $('select[name="chassis"]').append('<option value="'+ value.id +'" >' + value.nama + '</option>');
            });
        }
    });
    }else {
        $('select[name="chassis"]').empty();
        }
    });
    });
</script>