<?php

namespace App\Tables;

use App\Models\Categories;
use App\Models\Posts as ModelsPosts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Posts extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('title', 'LIKE', "%{$value}%")
                        ->orWhere('slug', 'LIKE', "%{$value}%");
                });
            });
        });


        return QueryBuilder::for(ModelsPosts::class)
            ->defaultSort('title')
            ->allowedSorts(['title', 'slug'])
            ->allowedFilters(['title', 'slug', 'category_id', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $categories = Categories::pluck('name', 'id')->toArray();

        $table
            ->column('title')
            ->column('slug')
            ->column('updated_at', label: 'Last updated')
            ->column('action', exportAs: false)
            ->withGlobalSearch(columns: ['title'])
            ->selectFilter('category_id', $categories)
            ->bulkAction(
                label: 'Touch timestamp',
                each: fn (ModelsPosts $c) => $c->touch(),
                before: fn () => info('Touching the selected projects'),
                after: fn () => Toast::info('Timestamps updated!')
            )
            ->bulkAction(
                label: 'Delete Category',
                each: fn (ModelsPosts $p) => $p->delete(),
                after: fn () => Toast::info('Posts deleted!')
            )
            ->export()
            ->paginate(50);
    }
}
