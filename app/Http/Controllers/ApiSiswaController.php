<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ApiSiswaController extends Controller
{
    public function createdataApi(Request $request)
    {
       
        $murid = new Siswa;
        $murid->nama_depan = $request->nama_depan;
        $murid->nama_belakang= $request->nama_belakang;
        $murid->jenis_kelamin = $request->jenis_kelamin;
        $murid->agama = $request->agama;
        $murid->alamat = $request->nama_depan;
        $murid->save();
        return response()->json([
            "message" => "student record created"
        ], 201);
        
    }

    public function getlist(){
        $siswa = Siswa::all();
        return $siswa;
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
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function getStudentById($id){
        if (Siswa::where('id', $id)->exists()) {
            $murid = Siswa::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
        //     return response($murid, 200);
        //   } else {
        //     return response()->json([
        //       "message" => "Student not found"
        //     ], 404);
        return view('siswa.indexById',['siswa'=> $murid]);
        
          }
    }

    public function deleteDatabyApi($id)
    {
        if (Siswa::where('id', $id)->exists()) {
            $murid = Siswa::find($id);
            $murid->delete();

            return response()->json([
                "message"=>"records deleted"
            ],202);
        }
        else{
            return response()->json([
                "message"=>"siswa not found"
            ],404);
        }
    }
}
