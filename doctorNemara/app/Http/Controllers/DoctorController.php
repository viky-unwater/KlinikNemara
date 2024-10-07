<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        // Mengambil dan mengurutkan data berdasarkan tanggal dan waktu janji
        $consultations = DB::table('consultations')
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        return view('doctor.dashboard', compact('consultations'));
    }

    public function show($id)
    {
        $consultation = DB::table('consultations')->where('id', $id)->first();
        return view('doctor.detail', compact('consultation'));
    }
}
