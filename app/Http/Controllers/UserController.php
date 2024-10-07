<?php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Treatment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch data from consultations and treatments
        $consultations = Consultation::all();
        $treatments = Treatment::all();

        // Merge the two collections
        $users = $consultations->merge($treatments);

        return view('admin.manage_users', compact('users'));
    }
}
