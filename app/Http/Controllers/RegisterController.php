<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showNew ( )
    {
        $newData = Employer::latest()->paginate(1);
        return response()->json($newData);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_asatidzah' => 'required',
            'email' => 'required|email|unique:employers',
            'mapel' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $employer = Employer::create([
            "nama_asatidzah" => $request->nama_asatidzah,
            "email" => $request->email,
            "mapel" => $request->mapel,
                   
        ]);
        return response()->json([
            'success' => true,
            'message' => 'data berhasil ditambahkan',
            'data' => $employer,
        ]);
    }
    public function show($id)
    {
        $employer = Employer::find($id);
        return response()->json([
            'success' => true,
            'message' => 'show data by id',
            'data' => $employer,
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all, [
            'nama_asatidzah' => 'required',
            'email' => 'required|email|unique',
            'mata_pelajaran' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $employer = Employer::find($id);

        $employer->update([
            "nama_asatidzah" => $request->nama_asatidzah,
            "email" => $request->email,
            "mata_pelajaran" => $request->mata_pelajaran,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'berhasil diupdate',
            'data' => $employer,
        ]);
    }
}
