<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class AuthController extends Controller
{
    public function index(Request $req) {
        if($req->session()->has("role")) {
            return redirect('/dashboard');
        }else{
            return view('login.login');
        }
    }

    public function logadm() {
        return view('login.logadm');
    }

    public function cekLogin(Request $req) {
        $kode = $req->kode;
        $pass = $req->pass;

        $adm = DB::table('tb_admin')->where('email',$kode)->count();
        $bus = DB::table('tb_bus')->where('kode',$kode)->count();

        if($bus != null) {
            $data=DB::table('tb_bus')->where('kode',$kode)->first();
            if(Hash::check($pass, $data->password))
            {
                $req->session()->put("id", $data->id);
                $req->session()->put("nama", $data->kode);
                $req->session()->put("foto", $data->foto);
                $req->session()->put("role", "dawiejI@EWADjaduwoHEEH#@*AHD");
                return redirect ('/');
            }else{
                return back()->with('error','Password salah, silahkan coba lagi');
            }
        }elseif($adm != null){
            $data=DB::table('tb_admin')->where('email',$kode)->first();
            if(Hash::check($pass, $data->password)){
                $req->session()->put("id", $data->id);
                $req->session()->put("nama", $data->username);
                $req->session()->put("foto", $data->foto);
                $req->session()->put("role", $data->UQ);
                return redirect('/');
            }else{
                return back()->with('error','Tidak dapat masuk, silahkan coba lagi');
            }
        }else{
            return back()->with('error','Tidak dapat masuk, silahkan coba lagi');
        }
    }

    public function home(Request $req) {
        $role = $req->session()->get("role");
        if($role == "dawiejI@EWADjaduwoHEEH#@*AHD"){
            return view('kru.home');
        }else{
            return view('admin.home');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}
