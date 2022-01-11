<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Storage;
use PDF;
use App\Models\DA;
use App\Models\DBU;
use App\Models\DCHS;
use App\Models\DLPJ;
use App\Models\DLPR;
use App\Models\DLWT;
use App\Models\DMF;
use App\Models\DRT;

class AdmController extends Controller
{
    public function home() {
        return view('admin.home');
    }

    public function laporan() {
        $data = DLPR::all();
        return view('admin.laporan.laporan', ['data'=>$data]);
    }
 
    public function dabus() {
        $data = DBU::all();
        return view('admin.bus.daftarbus', ['data'=>$data]);
    }

    public function rute() {
        $data = DRT::all();
        return view('admin.rute.rute', ['data'=>$data]);
    }

    public function damin() {
        $data = DA::all();
        return view('admin.adm.admin', ['data'=>$data]);
    }

    public function profil(Request $req) {
        $data = DA::find(session()->get('id'));
        return view('admin.profil', ['data'=>$data]);
    }

    public function update(Request $req) {
        if($req->pass == $req->rpass){
            $foto = $req->foto;
            if($foto != null) {
                $nfoto = $foto->getClientOriginalName();
                Storage::putFileAs('public/profil', $foto, $nfoto);
                $admf = DA::find($req->id);
                $admf->username = $req->username;
                    $admf->nama = $req->nama;
                    $admf->email = $req->email;
                    $admf->password = Hash::make($req->pass);
                    $admf->foto = $nfoto;
                $admf->update();
                $req->session()->put("foto",$nfoto);
                $req->session()->put("nama",$req->username);
                return redirect('/')->with('success','Berhasil memperbaharui data');
            }else{
                $adm = DA::find($req->id);
                $adm->username = $req->username;
                $adm->nama = $req->nama;
                $adm->email = $req->email;
                $adm->password = Hash::make($req->pass);
                $adm->update();
                $req->session()->put("nama",$req->username);
                return redirect('/')->with('success','Berhasil memperbaharui data');
            }
        }else{
            return back()->with('error','Password tidak sama, silahkan coba lagi');
        }
    }

    public function datasasis(Request $req) {
        $data = DCHS::all();
        return view('admin.chassis.datacasis', ['data'=>$data]);
    }

    public function sasis(Request $req) {
        $data = DMF::all();
        return view('admin.chassis.chassis',['data'=>$data]);
    }

    public function insertsasis(Request $req) {
        $chassis = DCHS::create([
            'nama' => $req->nama,
            'mesin' => $req->mesin,
            'jenis_transmisi' => $req->ma,
            'transmisi' => $req->transmisi,
            'suspensi' => $req->suspensi,
            'id_man' => $req->manufaktur
        ]);
        return redirect('/datachassis')->with('success','Berhasil menambahkan chassis');
    }

    public function get_sasis($id){
        $sasis=DCHS::where('id_man',$id)->get();
        return json_encode($sasis);
    }

    public function tambahbus() {
        $manufaktur=DMF::all();
        return view('admin.bus.tambahbus', ['data'=>$manufaktur]);
    }

    public function insertbus(Request $req) {
        $foto = $req->foto;
        $nfoto = $foto->getClientOriginalName();
        Storage::putFileAs('public/bus', $foto, $nfoto);
        $bus = DBU::create([
            'kode' => $req->kode,   
            'password' => Hash::make($req->pass),
            'tipe' => $req->bodi,
            'tahun' => $req->tahun,
            'kilometer' => '0',
            'foto' => $nfoto,
            'id_chassis' => $req->chassis,
            'id_man' => $req->manufaktur,
        ]);
        return redirect('/daftarbus')->with('success','Berhasil menambahkan armada bus');
    }

    public function databis($id) {
        $bus = DBU::find($id);
        return view('admin.bus.detail', ['bus'=>$bus]);
    }

    public function tambahadmin() {
        return view('admin.adm.tambahadm');
    }

    public function insertadmin(Request $req){
        if($req->pass == $req->rpass){
            $adm = DA::create([
                'username' => $req->username,
                'nama' => $req->nama,
                'email' => $req->email,
                'password' => Hash::make($req->pass),
                'foto' => 'default.png',
                'UQ' => '7097'
            ]);
            return redirect('/daftaradmin')->with('success','Berhasil menambahkan admin');
        }else{
            return back()->with('error','Password tidak sama, silahkan coba lagi');
        }
    }

    public function hapusakun($id) {
        DB::table('tb_admin')->where('id',$id)->delete();
        return back()->with('success','data berhasil dihapus');
    }

    public function tambahrute(){
        return view('admin.rute.tambahrute');
    }

    public function insertrute(Request $req){
        $rute = DRT::create([
            'kode' => $req->kode,
            'kota_asal' => $req->asal,
            'kota_tujuan' => $req->tujuan,
            'jalur' => $req->jalur
        ]);
        return redirect('/rute')->with('success','Berhasil menambahkan rute');
    }

    public function editbus($id) {
        $data = DBU::find($id);
        return view('admin.bus.editbus', ['data'=>$data]);
    }

    public function updatebus(Request $req) {
        if($req->pass == $req->rpass){
            $bus = DBU::find($req->id);
            $bus->kode = $req->kode;
            $bus->password = Hash::make($req->pass);
            $bus->update();
            return redirect('/daftarbus')->with('success','Berhasil memperbaharui data');
        }else{
            return back()->with('error','Password tidak sama, silahkan coba lagi');
        }
    }

    public function cetakoperasional(Request $req) {
        if($req->filled('tanggal')){
            $data = DLPR::where('tanggal',$req->tanggal)->get();
            $tanggal = $req->tanggal;

            $pdf = PDF::loadview('admin.cetak.laporoperasitgl',['data'=>$data], ['tanggal'=>$tanggal]);
            return $pdf->download('laporan-operasional-'.$req->tanggal.'.pdf');
        }else{
            $data = DLPR::all();

            $pdf = PDF::loadview('admin.cetak.laporoperasi',['data'=>$data]);
            return $pdf->download('laporan-operasional.pdf');
        }
    }

    public function cetakperawatan(Request $req) {
        if($req->filled('tanggal')){
            $data = DLPR::where([['tanggal',$req->tanggal],['operasional', 'Perawatan']])->get();
            $tanggal = $req->tanggal;

            $pdf = PDF::loadview('admin.cetak.laporoprwttgl',['data'=>$data], ['tanggal'=>$tanggal]);
            return $pdf->download('laporan-operasional-perawatan-'.$req->tanggal.'.pdf');
        }else{
            $data = DLPR::where('operasional', 'Perawatan')->get();

            $pdf = PDF::loadview('admin.cetak.laporoprwt',['data'=>$data]);
            return $pdf->download('laporan-operasional-perawatan.pdf');
        }
    }

    public function cetakperjalanan(Request $req) {
        if($req->filled('tanggal')){
            $data =DLPR::where([['operasional', 'Jalan'],['tanggal',$req->tanggal]])->get();
            $tanggal = $req->tanggal;

            $pdf = PDF::loadview('admin.cetak.laporopjlntgl',['data'=>$data], ['tanggal'=>$tanggal]);
            return $pdf->download('laporan-operasional-perjalanan-'.$req->tanggal.'.pdf');
        }else{
            $data = DLPR::where('operasional', 'Jalan')->get();

            $pdf = PDF::loadview('admin.cetak.laporopjln',['data'=>$data]);
            return $pdf->download('laporan-operasional-perjalanan.pdf');
        }
    }

    public function hapusbus($id) {
        DB::table('tb_bus')->where('id_bus', $id)->delete();
        return back();
    }

    public function hapusrute($id) {
        DB::table('tb_rute')->where('id_rute', $id)->delete();
        return back();
    }
}
