<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        // Ambil keranjang dari session
        $cart = session('cart', []);
        
        // Tampilkan halaman keranjang, jika kosong tetap kembalikan tampilan yang sama
        return view('cart.index', compact('cart'));
    }

    public function payment()
    {
        $cart = session('cart');
        
        // Jika keranjang kosong, kembali ke halaman keranjang dengan pesan error
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong. Silakan pilih produk.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.payment', compact('cart', 'total'));
    }

    public function processPayment(Request $request)
{
    // Mengambil data keranjang dari session
    $cart = session('cart');

    // Menghitung total dari semua item
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Buat transaksi baru
    $transactionDetails = [
        'order_id' => uniqid(), // ID unik untuk order
        'gross_amount' => $total, // Total dari semua item
    ];

    // Mengambil detail produk
    $itemDetails = [];
    foreach ($cart as $item) {
        $itemDetails[] = [
            'id' => $item['id'],
            'price' => $item['price'],
            'quantity' => $item['quantity'],
            'name' => $item['name'],
        ];
    }

    // Menyusun detail customer
    $customerDetails = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
    ];

    // Menyusun transaksi
    $transaction = [
        'transaction_details' => $transactionDetails,
        'customer_details' => $customerDetails,
        'item_details' => $itemDetails,
    ];

    try {
        // Mendapatkan snap token dari Midtrans
        $snapToken = Snap::getSnapToken($transaction);

        // Mengirimkan snapToken ke view
        return response()->json(['snap_token' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function success()
    {
        // Tampilkan halaman sukses pembayaran
        return view('cart.success');
    }

    public function failed()
    {
        // Tampilkan halaman gagal pembayaran
        return view('cart.failed');
    }
}