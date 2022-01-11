@extends('layout.loglay')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6"><img src="assets/img/web.png" width="500 px"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Sistem Operasional Armada Bus</h1>
                                    <h2 class="h4 text-gray-900 mb-4">PT. XYZ</h2>
                                </div>
                                <form class="user" method="POST" action="/ceklogin">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp" name="kode"
                                            placeholder="Masukkan Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="pass"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">
                                        Login
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection