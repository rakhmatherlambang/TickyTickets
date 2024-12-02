<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'category_id',
        'subcategory_id',
        'store_id',
        'regular_price',
        'discounted_price',
        'tax_rate',
        'stock_quantity',
        'stock_status',
        'stock_status',
        'visibility',
        'meta_title',
        'meta_description',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function strore(){
        return $this->belongsTo(store::class);
    }
    public function seller(){
        return $this->belongsTo(User::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
}
