<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table='abouts';
    protected $fillable = [
        'about_image',
        'about_title',
        'about_content',
        'about_status',
    ];
    protected $primaryKey = 'about_id';
    public function owner(){
        return $this->belongsTo('User');
    }
}
