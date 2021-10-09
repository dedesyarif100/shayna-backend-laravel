<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_pelanggan', 'kode_pelanggan'
    ];

    protected $table = 'orders';

    protected $hidden = [

    ];
}
