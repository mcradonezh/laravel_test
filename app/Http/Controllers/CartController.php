<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartController extends Controller
{

    public function index(Request $request)
    {
        if ($request->get("del")) {
            Cart::where(["id" => $request->get("del")])->delete();
        }
        $cart = $this->getCart();
        return view('cart', compact('cart'));
    }

    public static function addProduct(int $productId, int $count)
    {
        $cart = Cart::create([
            "count" => $count,
            "product_id" => $productId,
            "session_token" => session()->get("_token")
        ]);
    }

    public static function count(): int
    {
        $count = Cart::all()->count();
        return $count;
    }

    private function getCart(): array
    {
        $sessionToken = session()->get("_token");
        $res = array();
        $cart = Cart::where(["session_token" => $sessionToken])->get();
        foreach ($cart as $rec) {
            $item = array();
            $item["name"] = Product::where(["id" => $rec->product_id])->first()->name;
            $item["count"] = $rec->count;
            $item["id"] = $rec->id;
            $res[] = $item;
        }
        return $res;
    }

}
