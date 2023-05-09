<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    protected $attributes = [
        'status' => '0',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        
        return $this->belongsTo(User::class,'user_id');
    }

    public function product_image()
    {
        return $this->belongsTo(Product_image::class,'prouduct_id');
    }
}
