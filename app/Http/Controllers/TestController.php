<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Controllers\CartController;
use App\Models\Product;

class TestController extends Controller
{
    /*public function index(Request $request) {
        $data = $request->session()->all();
        $data["session_token"] = session()->get("_token");
        return view('test', compact('data'));
    }*/

    public function index() {
        $cart = Cart::where(["session_token" => "VZNv1aNNzB9l1Z7QxtsdMpWT2mVvxMiRFk00rVgP"])->get();
        $data = array();
        foreach ($cart as $elem) {
            $data_elem["id"] = $elem->id;
            $data_elem["product_id"] = $elem->product_id;
            $data_elem["product"] = Product::where(["id" => $elem->product_id])->first()->name;
            $data_elem["token"] = $elem->session_token;
            $data[] = $data_elem;
        }
        return view('test', compact('data'));
    }
}
