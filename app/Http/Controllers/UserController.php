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
            ->allowedFields([
                //basic
                'id',
                'name',

                //with relationships
                'roles.id',
                'roles.name',
                'roles.description',
            ])
            ->allowedIncludes(['role'])
            ->get();

        return response()->json($users);
    }
}
