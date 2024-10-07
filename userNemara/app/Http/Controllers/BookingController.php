<?php

namespace App\Http\Controllers;

use App\Models\Consultation; // Pastikan untuk mengimpor model Consultation
use App\Models\Treatment; // Pastikan untuk mengimpor model Treatment
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showReservationForm()
    {
        return view('reservation'); 
    }

    public function storeConsultation(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'birth_date' => 'required|date',
            'complaint' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        // Simpan detail konsultasi ke database
        $consultation = new Consultation();
        $consultation->name = $request->name;
        $consultation->phone = $request->phone;
        $consultation->gender = $request->gender;
        $consultation->birth_date = $request->birth_date;
        $consultation->complaint = $request->complaint;
        $consultation->appointment_date = $request->appointment_date;
        $consultation->appointment_time = $request->appointment_time;
        $consultation->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', "Terima kasih {$consultation->name}, reservasi Anda sudah kami catat! Silahkan langsung datang ke Nemara Beauty pada {$consultation->appointment_date} pukul {$consultation->appointment_time} sesuai pesanan Anda.");
    }

    public function storeTreatment(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'birth_date' => 'required|date',
            'last_facial' => 'nullable|date',
            'treatment_type' => 'required|string',
            'needs_consultation' => 'required|boolean',
            'complaint' => 'required_if:needs_consultation,1|string|nullable',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        // Simpan detail treatment ke database
        $treatment = new Treatment();
        $treatment->name = $request->name;
        $treatment->phone = $request->phone;
        $treatment->gender = $request->gender;
        $treatment->birth_date = $request->birth_date;
        $treatment->last_facial = $request->last_facial; // Nullable
        $treatment->treatment_type = $request->treatment_type; // Menggunakan 'treatment' untuk konsistensi
        $treatment->needs_consultation = $request->needs_consultation;
        $treatment->complaint = $request->complaint;
        $treatment->appointment_date = $request->appointment_date;
        $treatment->appointment_time = $request->appointment_time;
        $treatment->save();

        
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', "Terima kasih {$treatment->name}, reservasi Anda sudah kami catat! Silahkan langsung datang ke Nemara Beauty pada {$treatment->appointment_date} pukul {$treatment->appointment_time} sesuai pesanan Anda.");
    }
}
