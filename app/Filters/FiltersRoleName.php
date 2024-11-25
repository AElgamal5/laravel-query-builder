<?php

namespace App\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FiltersRoleName implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereHas('role', function (Builder $query) use ($value) {
            $query->where('name', $value);
        });
    }
}
