<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $this->queryBuilder();

        $users = $query->get();

        return response()->json($users);
    }

    private function queryBuilder(): QueryBuilder
    {
        $cols = User::columnList();

        return QueryBuilder::for(User::class)
            ->allowedFilters($cols)
            ->defaultSort("-created_at")
            ->allowedSorts($cols)
            ->allowedFields([...$cols, ...Role::columnList('role')])
            ->allowedIncludes(['role']);
    }
}
