<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

  use HasFactory;

  protected $table = 'employee';

  protected $fillable = [
    'name',
    'image',
    'keyword',
    'description',
    'content',
    'idcat',
    'status',
  ];

  protected $primaryKey = 'id';

  public function empcategory() {
    return $this->belongsTo('App\Models\Empcategory', 'id', 'id');
  }

}
