<?php

namespace App\Models;

use App\Traits\Multitenantable; // <--- Importar
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Branch extends Model
{
    use HasFactory, Multitenantable;
    protected $fillable = ['company_id', 'name', 'address'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
