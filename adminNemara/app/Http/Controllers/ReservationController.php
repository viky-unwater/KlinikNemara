<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function index()
    {
        // Fetch all treatments as reservations
        $reservations = Treatment::all(); // Assuming you want to use treatments as reservations
        return view('admin.manage_reservations', compact('reservations')); // Pass treatments to the view as reservations
    }

    public function completeReservation(Request $request, $id)
    {
        Log::info('Complete Reservation called with ID:', ['id' => $id]);
    
        $treatment = Treatment::find($id);
    
        if ($treatment) {
            if ($treatment->status !== 'completed') {
                // Ubah status menjadi completed
                $treatment->status = 'completed';
    
                // Tambahkan visitor_count untuk service yang sesuai
                $service = Service::where('name', $treatment->treatment_type)->first();
                if ($service) {
                    $service->increment('visitor_count'); // Increment visitor count
                    $service->save();
                    Log::info('Visitor count updated for service:', [
                        'service' => $service->name, 
                        'new_visitor_count' => $service->visitor_count
                    ]);
                }
    
                $treatment->save(); // Simpan perubahan pada treatment
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false, 'message' => 'Treatment already completed']);
        }
    
        return response()->json(['success' => false, 'message' => 'Treatment not found']);
    }
}

