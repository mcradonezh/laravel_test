<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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

    public function addToCart(Request $request)
    {
        $product = Cart::where(["product_id" => $request->post("addedid"),"session_token" => session()->get("_token")])->first();
        if ($product) {
            $product->count+=$request->post("count");
            $product->save();
        }
        else {
            $userId = Auth::check() ? Auth::id() : null;
            Cart::create([
                "count" => $request->post("count"),
                "product_id" => $request->post("addedid"),
                "session_token" => session()->get("_token"),
                "user_id" => $userId
            ]);
        }
        return redirect('/');

    }

    public static function count(): int
    {
        $count = Cart::where(["session_token" => session()->get("_token")])->count();
        return $count;
    }

    private function getCart(): array
    {
        $sessionToken = session()->get("_token");
        $res = array();
        if (Auth::check()) {
            $cart = Cart::where(["session_token" => $sessionToken])->get();
        }
        else {
            $cart = Cart::where(["user_id" => Auth::id()])->get();
        }
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
