<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'brand_name',
        'brand_desc',
        'brand_status',
    ];
    protected $primaryKey = 'brand_id';
    public function product()
    {
        return $this->hasMany('App\Models\Product','brand_id');
    }
}
