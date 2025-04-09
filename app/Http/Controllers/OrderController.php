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

    public function makeOrder() {
        $token = session()->get("_token");
        $orderList = array();
        $products = Cart::select(["product_id","count"])->where(["session_token" => $token])->get();
        foreach ($products as $product) {
            $item["product_id"] = $product->product_id;
            $item["count"] = $product->count;
            $orderList[] = $item;
        }
        Order::create([
            "product_list" => json_encode($orderList),
            "user_id" => Auth::id()
        ]);
        return view('/orders', compact('data'));
    }
}
