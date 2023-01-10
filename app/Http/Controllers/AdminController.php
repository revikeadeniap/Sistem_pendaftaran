<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::all();

        if($data){
            return new PostResource(true, 'List Data Admin', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function show($id)
    {
        $data = Admin::where('id', $id)->get();

        if($data){
            return new PostResource(true, 'Data Detail Admin', $data);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function store(Request $req)
    {
        
        $this->validate($req, [
            'nama_admin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $input =  Admin::create($req->all());

        if($input){
            return new PostResource(true, 'Data Admin berhasil ditambahkan', $input);
        }else{
            return response()->json("Gagal input");
        }

    }

    public function update(Request $req, $id)
    {
        
        $this->validate($req, [
            'nama_admin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $update = Admin::where('id', $id)->update($req->all());

        if($update){
            return new PostResource(true, 'Data Admin berhasil diubah', $update);
        }else{
            return response()->json("Gagal diubah");
        }
    }

    public function destroy($id)
    {
        $delete = Admin::where('id', $id)->delete();

        if($delete){
            return new PostResource(true, 'Data Admin berhasil dihapus', $delete);
        }else{
            return response()->json("Gagal hapus data");
        }
    }
}
