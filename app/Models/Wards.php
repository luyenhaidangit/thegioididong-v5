<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tbl_xaphuongthitran';
    protected $fillable = [

        'name_xaphuong',
        'type',
        'maqh',
    ];
    protected $primaryKey = 'xaid';
}
