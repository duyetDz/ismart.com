<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'email', 'address', 'phone_number', 'payment', 'note', 'customer_id', 'order_code', 'total_price'];

    public function orderItems()
    {
        return $this->hasMany(Order_item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }
}
