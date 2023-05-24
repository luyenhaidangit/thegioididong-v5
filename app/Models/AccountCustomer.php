<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AccountCustomer extends Authenticatable {

  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table='account_customers';
  protected $fillable = [
    'name',
    'email',
    'password',
      'image',
    'phone',
      'address',
      'wards',
      'province',
      'city',
      'token',
      'forgot',
      'status',
  ];
  protected $primaryKey = 'id';
  public function wishlist(){
    return $this->hasMany(Wishlist::class);
  }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'id');
    }
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];
  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

}
