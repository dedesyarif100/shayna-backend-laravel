<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Models\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function GetOrder(Request $request)
    {
        $id = $request->input('id');

        $order_detail = Order::all();

        if($order_detail) {
            return ResponseFormatter::success($order_detail, 'Data Order berhasil diambil');
        } else {
            return ResponseFormatter::error(null, 'Data Order tidak ada', 404);
        }
    }

    public function PostOrder(OrderRequest $request)
    {
        $data = $request->except('orders');

        $order_detail = Order::create($data);

        return ResponseFormatter::success($order_detail); 
    }

    public function UpdateOrder(Request $request, Order $order_detail, $id)
    {
        Order::where('id', $id);
        if(Order::where('id', $id)->exists()) {
            $order_detail = Order::where('id', $id)
                ->update([
                    'nama_pelanggan' => $request->nama_pelanggan,
                    'kode_pelanggan' => $request->kode_pelanggan,
                ]);
            return ResponseFormatter::success($order_detail, 'Data Order berhasil di update');
        } else {
            return ResponseFormatter::error(null, 'Data Order tidak ada', 404);
        }
    }

    public function DeleteOrder($id)
    {
        Order::where('id', $id);
        if (Order::where('id', $id)->exists()) {
            $order_detail = Order::where('id', $id)->delete();
            return ResponseFormatter::success($order_detail, 'Data Order berhasil dihapus');
        } else {
            return ResponseFormatter::error(null, 'Data Order tidak ada', 404);
        }
    }
}
