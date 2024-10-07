<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Membaca file CSV
        $file = public_path('products.csv');
        $products = [];

        // Membuka dan membaca isi file CSV
        if (($handle = fopen($file, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Parsing data CSV ke dalam array products
                $products[] = [
                    'name' => $data[1],
                    'stock' => $data[2],
                    'price' => $data[3],
                    'description' => $data[4],
                    'skin_type' => $data[5]
                ];
            }
            fclose($handle);
        }

        
        // Mengirim data ke view, beserta data keranjang dari session
        $cart = session()->get('cart', []);
        return view('products', ['products' => $products, 'cart' => $cart]);
    }

    public function showProducts()
    {
        $products = Product::all(); // Mengambil semua produk dari database
        return view('products', compact('products')); // Mengirimkan data produk ke view 'products'
    }

    public function addToCart(Request $request)
    {
        $product = $request->input('product');

        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Tambahkan produk ke keranjang
        $cart[] = $product;

        // Simpan kembali ke session
        session()->put('cart', $cart);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function removeFromCart(Request $request)
    {
        $product = $request->input('product');

        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Cari produk dalam keranjang dan hapus jika ditemukan
        if (($key = array_search($product, $cart)) !== false) {
            unset($cart[$key]);
        }

        // Update session dengan keranjang yang sudah diperbarui
        session()->put('cart', array_values($cart));

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function storeOrder(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'items' => 'required|array'
        ]);
    
        // Buat order baru
        $order = Order::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'pickup_date' => $validated['pickup_date'],
            'pickup_time' => $validated['pickup_time'],
            'items' => json_encode($validated['items']) // Simpan items sebagai JSON
        ]);
    
        // Kirim respon berhasil
        return response()->json([
            'message' => 'Pesanan berhasil disimpan!',
            'order' => $order
        ], 200);
    }
    
}
