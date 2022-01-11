<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\DA;
use App\Models\DBU;
use App\Models\DCHS;
use App\Models\DLPJ;
use App\Models\DLPR;
use App\Models\DLWT;
use App\Models\DMF;
use App\Models\DRT;

class KruController extends Controller
{
    public function home() {
        return view('kru.home');
    }

    public function lapor() {
        $id = DLPR::where([['status',"Dalam Perjalanan"],['id_bus',session()->get("id")]])->count();
        $perawatan = DLPR::where([['status',"Dalam Perawatan"],['id_bus',session()->get("id")]])->count();
        if($id == null) {
            if($perawatan == null) {
                return view('kru.lapor');
            }else{
                return view('kru.perawatan.checkout');
            }
        }else{
            return view('kru.perjalanan.checkout');
        }    
    }

    public function hisper() {
        $data = DLPR::where([['operasional',"Jalan"],['id_bus',session()->get("id")]])->get();
        return view('kru.perjalanan.hisper', ['data'=>$data]);
    }

    public function hispera() {
        $data = DLPR::where([['operasional',"Perawatan"],['id_bus',session()->get("id")]])->get();
        return view('kru.perawatan.hispera',['data'=>$data]);
    }

    public function operasi() {
        $data = DRT::all();
        return view('kru.perjalanan.jalan', ['data'=>$data]);
    }

    public function pilih(Request $req) {
        $pilihan = $req->operasi;
        $data = $req->tanggal;
        if($pilihan == "Jalan") {
            $lapj = DLPR::create([
                'tanggal' => $data,
                'operasional' => $pilihan,
                'status' => "0",
                'id_bus' => $req->id
            ]);
            return redirect('/laporjalan');
        }elseif($pilihan == "Perawatan"){
            $lapr = DLPR::create([
                'tanggal' => $data,
                'operasional' => $pilihan,
                'status' => "Dalam Perawatan",
                'id_bus' => $req->id
            ]);
            return redirect('/insertperawatan');
        }else{
            $lapp = DLPR::create([
                'tanggal' => $data,
                'operasional' => $pilihan,
                'status' => "Selesai",
                'id_bus' => $req->id
            ]);
            return redirect('/')->with('success','laporan telah diinput');
        }
    }

    public function insertjalan(Request $req) {
        $up = DLPR::find($req->id);
            $up->status = "Dalam Perjalanan";
            $up->update();
        $lapj = DLPJ::create([
            'id_rute' => $req->rute,
            'id_laporan' => $req->id
        ]);
        return redirect('/')->with('success','laporan telah diinput'); 
    }

    public function checkout(Request $req) {
        $kilo = DBU::find($req->bus);
        $total = $req->kilometer - $kilo->kilometer;
        $up = DBU::find($req->bus);
        $up->kilometer = $req->kilometer;
        $up->update();
        $lap = DLPR::find($req->laporan);
            $lap->status = "Selesai";
            $lap->update();
        $lapp = DLPJ::find($req->id);
            $lapp->kilometer = $total;
            $lapp->konsumsi = $req->konsumsi;
            $lapp->ban = $req->ban;
            $lapp->kondisi = $req->kondisi;
            $lapp->update();
        return redirect('/')->with('success','laporan telah diinput'); 
    }

    public function insertrawat() {
        $id = DLPR::where([['id_bus', session()->get("id")],['status',"Dalam Perawatan"]])->first();
        $lpr = DLWT::create([
            'id_laporan' => $id->id,
        ]);
        return redirect('/')->with('success','laporan telah diinput');
    }

    public function endperawatan(Request $req) {
        $up = DLPR::find($req->laporan);
        $up->status = "Selesai";
        $up->update();
        
        $lpw = DLWT::find($req->detail);
        $lpw->bagian = $req->Bagian;
        $lpw->jenis =  $req->jenis;
        $lpw->tanggal = $req->tanggal;
        $lpw->keterangan = $req->keterangan;
        $lpw->update();
        return redirect('/')->with('success','laporan telah diinput'); 
    }
}
