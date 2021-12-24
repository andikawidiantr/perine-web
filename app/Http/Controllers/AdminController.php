<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\buku;
use App\Peminjaman;
use DB;
use App\Pengguna;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        
        $buku  = buku::all();
        $response["book"] = $buku;
        $response["success"] = 1;
        return response()->json($response);
    }

    function createbuku (Request $request) {
        // $pengguna = Pengguna::create($request->all());
        
        $buku = buku::create([
            'buku' => $request->buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'jenis' => $request->jenis,
        ])
        ->get();

        return response()->json($buku);
    }

    public function updatebuku(Request $request, $id){
        // $buku  = DB::table('tb_buku')->where('id_buku',$request->input('id_buku'))->get();
        $update['buku'] = $request->buku;
        $update['penulis'] = $request->penulis;
        $update['penerbit'] = $request->penerbit;
        $update['jenis'] = $request->jenis;
        // $update['tahun_terbit'] = $request->get('tahun_terbit');
        // $update['isbn'] = $request->get('isbn');
        // $update['deskripsi'] = $request->get('deskripsi');
        
        buku::where('id_buku',$id)->update($update);
        $response["buku"] = $update;
        $response["success"] = 1;
        return response()->json($response);

        // $buku  = DB::table('tb_buku')->where('id_buku',$request->input('id_buku'))->get();
        //    $buku->buku = $request->input('buku');
        //    $buku->penulis = $request->input('penulis');
        //    $buku->penerbit = $request->input('penerbit');
        //    $buku->jenis = $request->input('jenis');
        //    $buku->update();
        //    $response["buku"] = $buku;
        //    $response["success"] = 1;
        // return response()->json($response);
    } 

    public function deletebuku($id){
        $data = buku::find($id);
        $data->delete();
        return response()->json('Removed successfully.');
    }

    public function history(){
        $data = peminjaman::where('status',"dipinjam")->get();
        $response["peminjaman"] = $data;
        $response["success"] = 1;
        return response()->json($response);
    } 

    public function gantistatus($id){

        $update['tanggal_kembali'] = Carbon::now();
        $update['status'] = "dikembalikan";
        // $update['penerbit'] = $request->penerbit;
        // $update['jenis'] = $request->jenis;

        
        peminjaman::where('id_peminjaman',$id)->update($update);
        $response["buku"] = $update;
        $response["success"] = 1;
        return response()->json($response);

    }

    public function showanggota(){
        
        $anggota  = Pengguna::all();
        $response["anggota"] = $anggota;
        $response["success"] = 1;
        return response()->json($response);
    }

    public function deleteanggota($id){
        $data = Pengguna::find($id);
        $data->delete();
        return response()->json('Removed successfully.');
    }

    //ifen
    public function indexanggota(){
        
        $pengguna_role = Pengguna::where('role', '=', 'pengguna')->get();
        $response["anggota"] = $pengguna_role;
        $response["success"] = 1;
        return response()->json($response);
    }

    public function indexadmin(){
        
        $admin_role = Pengguna::where('role', '=', 'admin')->get();
        $response["admin"] = $admin_role;
        $response["success"] = 1;
        return response()->json($response);
    }

    public function createadmin(Request $request){
        
        $admin = Pengguna::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'pass' => $request->pass,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => "admin",
        ])
        ->get();

        return response()->json($admin);

    }

    public function updateadmin(Request $request, $id){
        // $buku  = DB::table('tb_buku')->where('id_buku',$request->input('id_buku'))->get();
        $update['email'] = $request->email;
        $update['pass'] = $request->pass;
        $update['nama_user'] = $request->nama_user;
        $update['jenis_kelamin'] = $request->jenis_kelamin;
        
        Pengguna::where('id_user',$id)->update($update);
        $response["admin"] = $update;
        $response["success"] = 1;
        return response()->json($response);

    } 
}