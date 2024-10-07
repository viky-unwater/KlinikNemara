<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Method to show the available services (treatments)
    public function index()
    {
        $services = Service::all(); // Fetch all services
        return view('admin.manage_treatments', compact('services')); // Pass services to the view
    }

    // Method to show reservations
    public function reservations()
    {
        $reservations = Reservation::with('treatment')->get(); // Fetch all reservations with related treatments
        return view('admin.manage_reservations', compact('reservations')); // Pass reservations to the view
    }

    // Method to complete a reservation and increment visitor count
    public function completeReservation(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation) {
            // Increment visitor count for the associated service
            $service = Service::find($reservation->treatment_id);
            if ($service) {
                $service->visitor_count += 1; // Increment visitor count
                $service->save();
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
