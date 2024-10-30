<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        
        return view('cart.index', compact('cart', 'isEmptyCart'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        // Cek apakah item ada dalam keranjang
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->flash('success', 'Produk berhasil dihapus dari keranjang.');
        } else {
            session()->flash('error', 'Produk tidak ditemukan di keranjang.');
        }
        
        // Redirect ke halaman keranjang
        return redirect()->route('cart.index');
    }
}
