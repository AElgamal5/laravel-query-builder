<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait HasColumnList
{
    public static function columnList(?string $prefix = null): array
    {
        $model = new self();

        $columns = array_diff(
            Schema::getColumnListing($model->getTable()),
            $model->getHidden()
        );

        return $prefix
            ? array_map(fn($column) => "$prefix.$column", $columns)
            : $columns;
    }
}
