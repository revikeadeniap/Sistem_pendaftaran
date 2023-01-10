<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Http\Resources\PostResource;

class DivisiController extends Controller
{
    public function index()
    {
        $data = Divisi::all();

        if($data){
            return new PostResource(true, 'List Data Divisi', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function show($id)
    {
        $data = Divisi::where('id_divisi', $id)->get();

        if($data){
            return new PostResource(true, 'Data Detail Divisi', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function store(Request $req)
    {
        
        $this->validate($req, [
            'nama_divisi' => 'required',
            'jumlah_anggota' => 'required'
        ]);

        $input =  Divisi::create($req->all());

        if($input){
            return new PostResource(true, 'Data Divisi berhasil ditambahkan', $input);
        }else{
            return response()->json("Gagal input");
        }

    }

    public function update(Request $req, $id)
    {
        
        $this->validate($req, [
            'nama_divisi' => 'required',
            'jumlah_anggota' => 'required'
        ]);

        $update = Divisi::where('id_divisi', $id)->update($req->all());

        if($update){
            return new PostResource(true, 'Data Divisi berhasil diubah', $update);
        }else{
            return response()->json("Data gagal diubah");
        }
    }

    public function destroy($id)
    {
        $delete = Divisi::where('id_divisi', $id)->delete();

        if($delete){
            return new PostResource(true, 'Data Divisi berhasil dihapus', $delete);
        }else{
            return response()->json("Gagal hapus data");
        }
    }
}
