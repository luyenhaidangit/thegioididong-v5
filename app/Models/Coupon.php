<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupon';
    protected $fillable = [
        'coupon_id',
        'coupon_name',
        'coupon_code',
        'coupon_money',
        'coupon_qty',
        'status',
    ];
    protected $primaryKey = 'coupon_id';
    public function owner()
    {
        return $this->belongsTo('User');
    }
}
