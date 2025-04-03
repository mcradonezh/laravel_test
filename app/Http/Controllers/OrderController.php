<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index() {
        $userId = Auth::id();
        $orders = Order::where(["user_id" => $userId])->get();
        $data["user_id"] = $userId;
        $data["check"] = Auth::check();
        return view('test', compact('data'));
    }

    public function makeOrder(): bool {
        $token = session()->get("_token");
        $orderList = array();
        $products = Cart::where(["session_token" => $token])->get();
    }
}
