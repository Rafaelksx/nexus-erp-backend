<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'tax_id'];

    public function branches()
{
    // Una empresa tiene muchas sucursales
    return $this->hasMany(Branch::class);
}

public function products()
{
    // Una empresa tiene muchos productos en su catálogo maestro
    return $this->hasMany(Product::class);
}
}
