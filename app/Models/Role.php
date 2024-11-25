<?php

namespace App\Models;

use App\Traits\HasColumnList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    use HasFactory, HasColumnList;

    protected $fillable = [
        'name',
        'description',
    ];
}
