<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empcategory extends Model
{
    use HasFactory;
    protected $table='empcategory';
    protected $fillable = [
        'name',
        'description',
    ];
    protected $primaryKey = 'id';
    public function owner(){
      return $this->belongsTo('User');
    }
    public function employee(){
      return $this->hasMany('App\Models\Employee', 'id');
    }
}
