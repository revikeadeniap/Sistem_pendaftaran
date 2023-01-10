<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar;
use App\Http\Resources\PostResource;

class DaftarController extends Controller
{
    public function index()
    {
        $data = Daftar::all();

        if($data){
            return new PostResource(true, 'List Data Pendaftaran', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function show($id)
    {
        $data = Daftar::where('id', $id)->get();

        if($data){
            return new PostResource(true, 'Data Detail Pendaftaran', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function store(Request $req)
    {
        
        $this->validate($req, [
            'id_anggota' => 'required',
            'id_divisi' => 'required',
            'alasan' => 'required',
            'pengalaman_organisasi' => 'required'
        ]);

        $input =  Daftar::create($req->all());

        if($input){
            return new PostResource(true, 'Data Pendaftaran berhasil ditambahkan', $input);
        }else{
            return response()->json("Gagal input");
        }

    }

    public function update(Request $req, $id)
    {
        
        $this->validate($req, [
            'id_anggota' => 'required',
            'id_divisi' => 'required',
            'alasan' => 'required',
            'pengalaman_organisasi' => 'required'
        ]);

        $update = Daftar::where('id', $id)->update($req->all());

        if($update){
            return new PostResource(true, 'Data Pendaftaran berhasil diubah', $update);
        }else{
            return response()->json("Data gagal diubah");
        }
    }

    public function destroy($id)
    {
        $delete = Daftar::where('id', $id)->delete();

        if($delete){
            return new PostResource(true, 'Data Pendaftaran berhasil dihapus', $delete);
        }else{
            return response()->json("Gagal hapus data");
        }
    }
}
