<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $users = QueryBuilder::for(User::class)
            ->allowedFilters([])
            ->get();

        return response()->json($users);
    }
}
