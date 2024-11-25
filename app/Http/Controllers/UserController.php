<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\Enums\FilterOperator;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $users = QueryBuilder::for(User::class)
            ->allowedFilters([
                //general
                // 'name',
                // 'email',

                //specific
                // 'id',
                // AllowedFilter::partial('id'),
                // AllowedFilter::partial('id')->default(1),
                // AllowedFilter::partial('id')->ignore(['-1']),
                // AllowedFilter::beginsWithStrict('id'),
                // AllowedFilter::endsWithStrict('id'),
                // AllowedFilter::exact('id'),
                // AllowedFilter::operator('id', FilterOperator::DYNAMIC),
                // 'role.name'

                //aliases
                // AllowedFilter::partial('num', 'id'),
                // AllowedFilter::operator(name: 'num', filterOperator: FilterOperator::DYNAMIC, internalName: 'id'),

                //scopes
                // AllowedFilter::scope('roleEqual'),
                // AllowedFilter::scope('validatedBetween'),

                //trashed
                // AllowedFilter::trashed(),

                //callback
                // AllowedFilter::callback('last', fn(Builder $query, mixed $value) => $query->latest('id')->limit($value)),
                // AllowedFilter::callback('last', function (Builder $query, mixed $value, string $name) {
                //     $query->latest('id')->limit($value);
                // }),

            ])
            // ->with('role')
            ->get();

        return response()->json($users);
    }
}
