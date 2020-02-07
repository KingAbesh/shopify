<?php



namespace App\Http\Controllers;
use App\User;

class CartController extends Controller
{
    public function index()
    {
        $cart = User::find(1)->cart;

        return response()->json([
            "success" => true,
            "data" => $cart
        ], 200);
    }
}