<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'orders';

    protected $fillable = [
        'code',
        'order_data',
        'order_status',
        'payment_method',
        'payment_status',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'order_data' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
