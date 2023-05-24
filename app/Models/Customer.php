<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table='customer';
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_address',
        'customer_phone_number',
        'customer_note',


    ];
    protected $primaryKey = 'customer_id';
    public function owner(){
        return $this->belongsTo('User');
    }
    // In product model
    public function order(){
        return $this->hasMany('App\Models\Order', 'customer_id','customer_id');
    }
}
