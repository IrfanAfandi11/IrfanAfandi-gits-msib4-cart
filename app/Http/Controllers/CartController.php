<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $data ['title'] = 'AS | Online Shop';
        $data['products'] = Product::with('category')->get();

        return view('frontend.home', $data);
    }

    // detail cart
    public function dcart($id){
        $data ['title'] = 'Detail Cart';
        $data['products'] = Product::find($id);

        return view('frontend.detail', $data);
    }

    // cart
    public function cart($id){
        $data ['title'] = 'Cart';
        $data['products'] = Product::find($id);
        $data['user'] = User::find($id);
        $data['tanggal'] = Carbon::now();
        $data['cart'] = Cart::find($id);

        return view('dashbord.pages.cart', $data);
    }
}
