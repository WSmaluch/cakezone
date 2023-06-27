<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    protected $table = "orderproducts";
    protected $primaryKey = "id";

    public function orders()
    {
        return $this -> belongsTo(Orders::class, "order_id ");
    }
    public function products()
    {
        return $this -> belongsTo(Products::class, "product_id");
    }
}
