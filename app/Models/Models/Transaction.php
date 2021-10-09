<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid', 'name', 'email', 'number', 'address', 'transaction_total', 'transaction_status'
    ];
    protected $table = 'transactions';

    protected $hidden = [

    ];

    public function details() {
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }
}
