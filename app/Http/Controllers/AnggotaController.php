<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengguna;
use App\Peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class AnggotaController extends Controller
{   
    function registrasi(Request $request) {
        // $pengguna = Pengguna::create($request->all());
        
        $pengguna = Pengguna::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'pass' => $request->pass,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => "pengguna",
        ])
        ->get();

        return response()->json($pengguna);
    }

    function loginAndroid(Request $request) {
        $logins = \App\Pengguna::where('email', $request->email)
        ->where('pass', $request->password)
        ->get();

        if (count($logins) > 0) {
            foreach ($logins as $logg) {
                $result["success"] = "1";
                $result["message"] = $logg;
                $result["user_type"] = $logg->role;
                // $result["message"] = $request->role;
                //untuk memanggil data sesi Login
                $result["id_user"] = $logg->id_user;
                $result["nama_user"] = $logg->nama_user;
                $result["email"] = $logg->email;
                $result["role"] = $logg->role;
                $result["pass"] = $logg->pass;
                $result["jenis_kelamin"] = $logg->jenis_kelamin;

            }
            // return $result;
            return response()->json($result);
        } else {
            $result["success"] = "0";
            $result["message"] = "error";
            return $result;
        }
    }

    function createtransaksi(Request $request) {
        
        $pinjam = peminjaman::create([
            'id_user' => $request->id_user,
            'id_buku' => $request->id_buku,
            'nama_user' => $request->nama_user,
            'nama_buku' => $request->nama_buku,
            'tanggal_pinjam' => Carbon::now(),
            'status'=>"dipinjam",
        ])
        ->get();
        return response()->json($pinjam);
    }

    public function showpinjem($id){
        $data = peminjaman::where('id_user',$id)->get();
        $response["peminjaman_anggota"] = $data;
        $response["success"] = 1;
        return response()->json($response);
    } 

    public function updateprofile(Request $request, $id){

        $update['email'] = $request->email;
        $update['pass'] = $request->pass;
        $update['nama_user'] = $request->nama_user;
        $update['jenis_kelamin'] = $request->jenis_kelamin;

        Pengguna::where('id_user',$id)->update($update);
        $response["edit_profile"] = $update;
        $response["success"] = 1;
        return response()->json($response);

    } 
    
}
