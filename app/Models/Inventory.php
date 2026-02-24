<?php

namespace App\Models;

use App\Traits\Multitenantable; // <--- Importar
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = ['product_id', 'branch_id', 'quantity', 'min_alert'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function movements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
