<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table='faq';
    protected $fillable = [
        'faq_serial',
        'faq_title',
        'faq_description',
        'status',
    ];
    protected $primaryKey = 'faq_id';
    public function owner(){
        return $this->belongsTo('User');
    }
}
