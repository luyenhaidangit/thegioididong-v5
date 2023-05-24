<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $table='logos';
    protected $fillable = [
        'logo_image',
        'logo_status',
    ];
    protected $primaryKey = 'logo_id';
    public function owner(){
        return $this->belongsTo('User');
    }
}
