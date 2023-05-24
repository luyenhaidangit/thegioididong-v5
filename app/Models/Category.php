<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $fillable = [
        'category_name',
        'category_content',
        'category_status',
        'category_icon',
    ];
    protected $primaryKey = 'category_id';
    public function product()
    {
        return $this->hasMany('App\Models\Product','category_id');
    }
}
