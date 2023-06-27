<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    protected $table = "Orders";
    protected $primaryKey = "id";

    public function OrdersProducts()
    {
        return $this->hasMany(OrderProducts::class, "order_id");
    }
}
