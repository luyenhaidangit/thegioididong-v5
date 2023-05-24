<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='comment';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'comment_content',
        'create_date',
        'comment_status',
        'star',
        'customer_id',
    ];
    protected $primaryKey = 'comment_id';
    public function product()
    {
        return $this->belongsTo('App\Models\Comment', 'product_id', 'id');
    }
    public function account_customers()
    {
        return $this->belongsTo('App\Models\AccountCustomer', 'customer_id', 'id');
    }
}
