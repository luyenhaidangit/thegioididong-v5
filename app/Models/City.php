<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'tbl_tinhthanhpho';
    protected $fillable = [

        'name_city',
        'type',
    ];
    protected $primaryKey = 'matp';
}
