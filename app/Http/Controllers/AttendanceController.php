<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index ()
    {
        $absenData = Attendance::all();
        return response()->json([
            'data' => $absenData,
        ]);
    }
    public function show ( $cust_id )
    {
        $absenData = Employer::find($cust_id);
        return response()->json([
            'success' => true,
            'data' => $absenData,
        ]);
    }
    public function store ( Request $request )
    {
        $validator = Validator::make($request->all(),[
            'nama_ustadz' => 'required',
            'waktu_kehadiran' => 'required',
            'tanggal_kehadiran' => 'required',
        ]);

        if( $validator->fails() ) 
        {
            return response()->json([
                'success' => false,
                'message' => 'try again!'
            ]);
        } 
        $data = Attendance::create([
            'nama_ustadz' => $request->nama_ustadz,
            'waktu_kehadiran' => $request->waktu_kehadiran,
            'tanggal_kehadiran' => $request->tanggal_kehadiran
        ]);

        return response()->json([
            'success' => true,
            'message' => 'absen berhasil ditambahkan',
            'data' => $data
        ]);
    }
}
