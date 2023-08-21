<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    public function register ( Request $request )
    {
        $validation = Validator::make($request->all(),[
            'nama_mapel' => 'required',
        ]);
        if($validation->fails())
        {
            return response()->json($validation->errors(), 400);
        }
        $mapel = Mapel::make([
            'nama_mapel' => $request->nama_mapel,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'mapel sudah ditambahkan',
            'data' => $mapel,
        ]);    
    }
    public function showMapel ()
    {
        $mapel = Mapel::all();
        return response()->json([
            'success' => true,
            'data' => $mapel
        ]);
    }

}
