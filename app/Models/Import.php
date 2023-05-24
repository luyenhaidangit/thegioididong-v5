<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $table = 'import';
    protected $fillable = [
        'product_id',
        'import_qty',
        'import_price',
        'import_status',
    ];
    protected $primaryKey = 'import_id';
    public function Product() {
        return $this->belongsTo(Product::class);
    }


}
