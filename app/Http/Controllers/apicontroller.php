<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NamaPegawai;

class apicontroller extends Controller
{
    // show all data
    public function get_pegawai(){
        return response()->json(NamaPegawai::all(),200);
    }

    // single single data
    public function single_pegawai($id){
        $check_pegawai = NamaPegawai::firstWhere('id', $id);
        if($check_pegawai){
            return response()->json(NamaPegawai::find($id),200);
        }else{
            return response([
                'status' => false,
                'message' => 'Tidak ditemukan'
            ], 404);
        }
    }


    // insert data
    public function insert_pegawai(Request $request){
        $insert_pegawai = new NamaPegawai;
        $insert_pegawai->nama_pegawai = $request->nama_pegawai;
        $insert_pegawai->umur_pegawai = $request->umur_pegawai;
        $insert_pegawai->jabatan = $request->jabatan;
        $insert_pegawai->save();

        return response([
            'status'=>'Ok',
            'message'=>'berhasil!',
            'data'=>$insert_pegawai
        ],200);
    }

    // update data
    public function update_pegawai(Request $request, $id){
        $check_pegawai = NamaPegawai::firstWhere('id', $id);
        if($check_pegawai){
            $data_pegawai = NamaPegawai::find($id);
            $data_pegawai->nama_pegawai = $request->nama_pegawai;
            $data_pegawai->umur_pegawai = $request->umur_pegawai;
            $data_pegawai->jabatan = $request->jabatan;
            $data_pegawai->save();
            return response([
                'status' => true,
                'message' => 'Data Berhasil Dirubah',
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'Tidak ditemukan'
            ], 404);
        }
    }

    // delte data
    public function delete_pegawai($id){
        $check_pegawai = NamaPegawai::firstWhere('id', $id);
        if($check_pegawai){
            NamaPegawai::destroy($id);
            return response([
                'status' => true,
                'message' => 'Data Dihapus',
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

}
