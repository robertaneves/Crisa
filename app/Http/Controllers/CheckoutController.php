<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function indexCheckout(){
        $user = Auth::user();
        return view('checkout.index', compact('user'));
    }
}