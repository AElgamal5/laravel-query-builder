<?php

namespace App\Models;

use App\Traits\HasColumnList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
