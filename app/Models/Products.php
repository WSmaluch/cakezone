<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    protected $table = "Products";
    protected $primaryKey = "id";

    public function OrdersProducts()
    {
        return $this->hasMany(OrderProducts::class, "product_id");
    }
}
