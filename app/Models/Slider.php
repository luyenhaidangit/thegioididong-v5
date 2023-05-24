<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table='slider';
    protected $fillable = [
        'image',
        'slider_small_title',
        'slider_big_title',
        'highlight_text',
        'slider_description',
        'slider_link',
        'slider_title_button',
        'status',
    ];
    protected $primaryKey = 'slider_id';
    public function owner(){
        return $this->belongsTo('User');
    }
}
