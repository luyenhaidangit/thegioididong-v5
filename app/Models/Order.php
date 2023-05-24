<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $fillable = [
        'order_total',
        'order_payment',
        'order_status',
        'customer_id',
        'shipping_id',
        'coupon_id',
        'created_at',

    ];
    protected $primarykey = 'order_id';
    public function owner(){
        return $this->belongsTo('User');
    }
    public function order_details()
    {
        return $this->hasMany('App\Models\Order_Details','order_id');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'order_id');
    }
    public function coupon(){
        return $this->belongsTo('App\Models\Coupon', 'coupon_id');
    }
    public function shipping(){
        return $this->belongsTo('App\Models\Shipping', 'shipping_id');
    }

}
