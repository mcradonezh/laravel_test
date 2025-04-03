<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\CartController;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get("addedid") && $request->get("count")) {
            CartController::addProduct(
                $request->get("addedid"),$request->get("count")
            );
        }

        $vars = array();
        $vars["products"] = Product::all();
        $vars["cart_count"] = CartController::count();
        $vars["get"]["addedid"] = $request->get("addedid");
        $vars["get"]["count"] = $request->get("count");
        return view('catalog', compact('vars'));
    }
}
