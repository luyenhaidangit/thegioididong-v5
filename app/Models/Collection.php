<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $table='collection';
    protected $fillable = [
        'collection_image',
        'collection_title',
        'collection_name',
        'collection_status',
        'collection_position',
    ];
    protected $primaryKey = 'collection_id';
    public function product()
    {
        return $this->hasMany('App\Models\Product','collection_id');
    }

}
