<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;

    protected $table = "comparisons";
    protected $fillable=['product_id','customer_id'];
    protected $primaryKey = 'comparison_id';
    public function AccountCustomer() {
        return $this->belongsTo(AccountCustomer::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
