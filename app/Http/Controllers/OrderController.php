<?php

namespace App\Http\Controllers;

use App\Models\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $items = Order::all();

        return view('pages.order.index')->with([
            'items' => $items
        ]);
    }
}
