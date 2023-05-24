<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shipping';
    protected $fillable = [
        'shipping_city',
        'shipping_province',
        'shipping_wards',
        'shipping_fee',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_note',
    ];
    protected $primaryKey = 'shipping_id';
    public function owner(){
        return $this->belongsTo('User');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order','shipping_id');
    }
}
