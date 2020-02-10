<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\User;

class CartController extends Controller
{

    /**
     * ! Gets all items in a user's cart
     */
    public function index()
    {
        $cart = Cart::where('user_id', 1)->get();

        $item = Cart::where('id', 1)->first()->items;

        if(!$cart) {
            return response()->json([
                "success" => false,
                "message" => 'You have no items in your cart'
            ]);
        }
        return response()->json([
            "success" => true,
            "data" => $cart,
            "item" => $item
        ], 200);
    }

    public function store($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                "success" => false,
                "message" => "Item does not exist",
            ], 404);
        }

        $cart = User::findOrFail(1)->cart()->where("item_id", $item->id)->first();
        if (!User::findOrFail(1)->cart()->where("item_id", $item->id)->exists()) {
            $cart = Cart::create([
                "quantity" => 1,
                "name" => $item->name,
                "price" => $item->price,
                "user_id" => User::find(1)->id,
                "item_id" => $item->id,
            ]);
            $cart->save();
            return response()->json([
                "success" => true,
                "message" => "Item successfully added to cart",
            ]);
        } else {
            $cart->quantity += 1;
            $cart->save();
            return response()->json([
                "success" => true,
                "message" => "Item successfully added to cart",
            ], 200);
        }
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                "success" => false,
                "message" => "Item does not exist",
            ], 404);
        }

        $cart = User::findOrFail(1)->cart()->where("item_id", $item->id)->first();
        if ($cart->delete()) {
            return response()->json([
                "success" => true,
                "message" => "Item successfully removed from cart",
            ]);
        }
        return response()->json([
            "success" => false,
            "message" => "An error was encountered while carrying out this action",
        ], 401);

    }
    public function clear_cart()
    {

        if (User::findOrFail(1)->cart()->delete()) {
            return response()->json([
                "success" => true,
                "message" => "Cart successfully cleared",
            ], 200);
        }
        return response()->json([
            "success" => false,
            "message" => "An error was encountered while carrying out this action",
        ], 401);

    }
}