<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = QueryBuilder::for(User::class)
            ->allowedIncludes([
                //basic
                // 'role',

                //nested
                // 'role.permissions',

                //count
                // AllowedInclude::count('roleCount'),

                //exist
                // AllowedInclude::exists('roleExists'),

                //note
                // 'role',  // allows including `role` or `roleCount` or `roleExists`

                //aliases
                // AllowedInclude::relationship('rank', 'role'),
                // AllowedInclude::relationship('rank.authorities', 'role.permissions')

                //callback
                // AllowedInclude::callback('role', function ($query) {
                //     $query->with('role');
                // }),
            ])
            ->get();

        return response()->json($users);
    }
}
