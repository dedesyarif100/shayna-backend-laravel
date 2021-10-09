<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id', 'products_id'
    ];

    protected $hidden = [

    ];

    public function product() {
        return $this->belongsTo(Product::class, 'products_id','id');
    }

    public function transaction() {
        return $this->belongsTo(Transaction::class, 'transactions_id','id');
    }
}
