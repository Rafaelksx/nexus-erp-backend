<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable
{
    public static function bootMultitenantable()
    {
        // Este código se ejecuta automáticamente en cada consulta al modelo
        static::addGlobalScope('company_id', function (Builder $builder) {
            if (app()->bound('current_company_id')) {
                $builder->where('company_id', app('current_company_id'));
            }
        });
    }
}