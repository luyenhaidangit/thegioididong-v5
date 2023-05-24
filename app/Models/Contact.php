<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;
  protected $table='contacts';
  protected $fillable = [
    'contacts_name',
    'contacts_email',
    'contacts_title',
    'contacts_comment',
  ];
  protected $primaryKey = 'contacts_id';
  public function owner(){
    return $this->belongsTo('User');
  }
}
