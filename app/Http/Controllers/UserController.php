<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Sorts\StringLengthSort;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = QueryBuilder::for(User::class)
            ->allowedSorts([
                //basic
                'id',
                'name',

                //custom
                // AllowedSort::custom('name-length', new StringLengthSort(), 'name'),

                //alias
                // AllowedSort::field('num', 'id'),

                //callback
                // AllowedSort::callback('role-name', function (Builder $query, $direction) {
                //     $query->whereHas('role', function ($roleQuery) use ($direction) {
                //         $roleQuery->orderBy('name', $direction ? 'asc' : 'desc');
                //     });
                // })
            ])
            // ->defaultSort('-created_at')
            // ->defaultSort('-created_at', 'name')
            // ->with('role')
            ->get();

        return response()->json($users);
    }
}
