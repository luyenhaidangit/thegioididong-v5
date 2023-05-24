<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model {

  use HasFactory;

  protected $table = "wishlists";
  protected $fillable=['product_id','customer_id'];
  protected $primaryKey = 'id';
  public function AccountCustomer() {
    return $this->belongsTo(AccountCustomer::class);
  }
  public function product() {
    return $this->belongsTo(Product::class);
  }

}
