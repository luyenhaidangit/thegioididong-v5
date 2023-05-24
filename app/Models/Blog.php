<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table='blog';
    protected $fillable = [
        'image',
        'blog_title',
        'blog_author',
        'blog_time',
        'blog_description',
        'view',
        'status',
    ];
    protected $primaryKey = 'blog_id';
    public function owner(){
        return $this->belongsTo('User');
    }
}
