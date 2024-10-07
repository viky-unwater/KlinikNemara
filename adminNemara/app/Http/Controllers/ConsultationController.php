<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::all();
        return view('admin.manage_consultations', compact('consultations'));
    }

    public function updateStatus($id)
    {
        $consultation = Consultation::find($id);
    
        if ($consultation) {
            // Update status consultation
            $consultation->status = $consultation->status === 'completed' ? 'pending' : 'completed';
            $consultation->save();
    
            // Return JSON response
            return response()->json([
                'success' => true,
                'new_status' => $consultation->status
            ]);
        }
    
        // Return error if not found
        return response()->json(['success' => false, 'message' => 'Consultation not found'], 404);
    }
    
}
