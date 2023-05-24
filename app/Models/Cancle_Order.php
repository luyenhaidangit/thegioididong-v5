<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancle_Order extends Model
{
    use HasFactory;
    protected $table = 'cancel_order';
    protected $fillable = [
        'customer_id',
        'order_id',
        'content',
        'status',
    ];
    protected $primaryKey = 'cancel_id';
    public function AccountCustomer() {
        return $this->belongsTo(AccountCustomer::class);
    }
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
