<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    // Display the list of orders
    public function index() {
        $orders = Order::all();
        return view('admin.orders.manage', compact('orders'));
    }

    // Mark the order as received and update the stock
    public function acceptOrder($id) {
        $order = Order::find($id);
    
        if ($order && $order->status == 'pending') {
            // Loop through items in the order and reduce stock
            $items = json_decode($order->items);
            foreach ($items as $item) {
                $product = Product::find($item->id);
                if ($product) {
                    $product->stock -= 1; // Assuming 1 quantity per order item
                    $product->save();
                }
            }
    
            // Update order status to 'completed'
            $order->status = 'completed';
            $order->save();
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false]);
    }
    
}
