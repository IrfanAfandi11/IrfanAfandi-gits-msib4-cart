<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function transaksi()
    {
        $title = 'Transaksi';
    	$cart = Cart::where('id', Auth::user()->id)->first();
    	$transaction = Transaction::where('cart_id', $cart->id)->get();

    	return view('dashbord.pages.transaksi', compact('title','cart','transaction'));
    }
}
