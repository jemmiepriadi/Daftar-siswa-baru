<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        //$data_siswa = DB::table('siswa')->get(); -> sama aja ama yang dibawah
        //$data_siswa = DB::table('siswa')->where('nama_depan','jemmi')->get();
        $data_siswa = \App\Models\Siswa::all();
        return view('siswa.index',['data_siswa' =>$data_siswa]);
    }
    
    public function create(Request $post){
        \App\Models\Siswa::create($post->all());
        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    public function edit($id)
    {
        if(Siswa::where('id', $id)->exists()){
            $murid = Siswa::find($id);
            return view('/siswa/edit',['editSiswa' => $murid]);
        }
    }

    public function updateStudent(Request $request, $id) {
        if (Siswa::where('id', $id)->exists()) {
            $murid = Siswa::find($id);
            $murid->nama_depan = is_null($request->nama_depan) ? $murid->nama_depan : $request->nama_depan;
            $murid->nama_belakang = is_null($request->nama_belakag) ? $murid->nama_belakang : $request->nama_belakang;
            $murid->jenis_kelamin = is_null($request->jenis_kelamin) ? $murid->jenis_kelamin : $request->jenis_kelamin;
            $murid->agama = is_null($request->agama) ? $murid->agama: $request->agama;
            $murid->alamat = is_null($request->alamat) ? $murid->alamat : $request->alamat;
            $murid->save();
    
            return redirect('/siswa')->with('sukses','Data berhasil diupdate');
        }
    }

    public function getStudentById($id){
        if (Siswa::where('id', $id)->exists()) {
            $murid = Siswa::where('id',$id)->get();
            return view('siswa.indexById',['siswa'=> $murid]);
        }
        else{
            echo '<script>alert("Siswa Not Found");window.location.href="siswa.index";</script>';
        }
    }

    public function deleteData($id)
    {
        if (Siswa::where('id', $id)->exists()) {
            $murid = Siswa::find($id);
            $murid->delete();

            return redirect('/siswa')->with('sukses','Data berhasil dihapus');
        }
        else{
            echo '<script>alert("Delete Failed");window.location.href="siswa.index";</script>';
        }
    }

}
