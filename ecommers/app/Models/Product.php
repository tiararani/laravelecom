<?php

namespace App\Models;

use App\Models\Subcategory;
use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function subCategories()
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class,'product_id');
    }
}
