<?php

namespace App\Http\Controllers;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return response()->json([
            'success' => true,
            'data' => $items,
        ], 200);

    }
}