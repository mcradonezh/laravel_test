<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class AuthController extends Controller
{
    public function login(Request $request) {
        return view('login');
    }

    public function reg(Request $request) {
        return view('reg');
    }

    public function logout() {
        Auth::logout();
        return redirect("/");
    }


    public function auth(Request $request) {
        $login = $request->post("login");
        $password = $request->post("password");
        Auth::attempt(["name" => $login, "password" => $password]);
        return redirect("/");
    }

    public function regUser(Request $request) {
        $login = $request->post("login");
        $password = $request->post("password");
        $email = $request->post("email");
        User::create(["name" =>$login, "password" => $password, "email" => $email]);
        Auth::attempt(["name" => $login, "password" => $password]);
        $this->cartToUser();

        return redirect("/");
    }

    private function cartToUser() {
        $cart = Cart::where(["session_token" => session()->get("_token")])->update(["user_id" => Auth::id()]);
    }
}
