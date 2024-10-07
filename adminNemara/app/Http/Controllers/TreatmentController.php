<?php
namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all(); // Fetch all treatments
        return view('admin.manage_treatments', compact('treatments'));
    }

    public function completeTreatment($id)
    {
        $treatment = Treatment::find($id);

        if ($treatment) {
            // Increment visitor count
            $treatment->visitor_count += 1;
            $treatment->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
