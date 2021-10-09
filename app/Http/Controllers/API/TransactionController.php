<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with(['details.product'])->find($id);

        if($product)
            return ResponseFormatter::success($product, 'Data transaksi berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data transaksi tidak ada', 404);
    }

    public function GetTransaction()
    {
        $transaction_detail = Transaction::all();

        if ($transaction_detail) {
            return ResponseFormatter::success($transaction_detail, 'Semua Data transaksi berhasil diambil');
        } else {
            return ResponseFormatter::error(null, 'Semua Data transaksi tidak ditemukan', 404);
        }
    }
}
