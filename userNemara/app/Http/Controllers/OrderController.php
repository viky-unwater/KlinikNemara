<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'items' => 'required|array',
        ]);

        // Simpan data pesanan ke database
        $order = new Order();
        $order->name = $validated['name'];
        $order->phone = $validated['phone'];
        $order->pickup_date = $validated['pickup_date'];
        $order->pickup_time = $validated['pickup_time'];
        $order->items = json_encode($validated['items']); // Simpan items dalam bentuk JSON
        $order->save();

        // Berikan respons kembali ke client
        return response()->json(['message' => 'Pesanan berhasil disimpan'], 200);
    }
}
