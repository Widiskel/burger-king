<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cart extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'cart';

    protected $fillable = [
        'store_code',
        'mobile_number',
        'name',
        'address',
        'latitude',
        'longitude',
        'notes',
        'items',
        'subtotal',
        'tax',
        'delivery_fee',
        'grand_total',
        'promotion_code',
        'free_items',
        'delivery_surcharge',
        'promotion_items',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'items' => 'json',
        'free_items' => 'json',
        'promotion_items' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function menu()
    {
        $itemCodes = collect($this->items)->pluck('code')->toArray();
    
        return Menu::whereIn('id', $itemCodes)->get();
    }

}
