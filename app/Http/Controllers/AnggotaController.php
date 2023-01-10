<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Http\Resources\PostResource;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::all();

        if($data){
            return new PostResource(true, 'List Data Anggota', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function show($id)
    {
        $data = Anggota::where('id_anggota', $id)->get();

        if($data){
            return new PostResource(true, 'Data Detail Anggota', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function store(Request $req)
    {
        
        $this->validate($req, [
            'nama_anggota' => 'required',
            'nim' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $input =  Anggota::create($req->all());

        if($input){
            return new PostResource(true, 'Data Anggota berhasil ditambahkan', $input);
        }else{
            return response()->json("Gagal input");
        }

    }

    public function update(Request $req, $id)
    {
        
        $this->validate($req, [
            'nama_anggota' => 'required',
            'nim' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $update = Anggota::where('id_anggota', $id)->update($req->all());

        if($update){
            return new PostResource(true, 'Data Anggota berhasil diubah', $update);
        }else{
            return response()->json("Data gagal diubah");
        }
    }

    public function destroy($id)
    {
        $delete = Anggota::where('id_anggota', $id)->delete();

        if($delete){
            return new PostResource(true, 'Data Anggota berhasil dihapus', $delete);
        }else{
            return response()->json("Gagal hapus data");
        }
    }
}
