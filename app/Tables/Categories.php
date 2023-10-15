<?php

namespace App\Tables;

use App\Models\Categories as ModelsCategories;
use App\Models\Posts;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class Categories extends AbstractTable
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
        return ModelsCategories::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['name'])
            ->column('name', sortable: true, canBeHidden: true)
            ->column('slug')
            ->column('updated_at', label: 'Last updated')
            ->column('action', exportAs: false)
            ->defaultSort('created_at')
            ->bulkAction(
                label: 'Touch timestamp',
                each: fn (ModelsCategories $c) => $c->touch(),
                before: fn () => info('Touching the selected projects'),
                after: fn () => Toast::info('Timestamps updated!')
            )
            ->bulkAction(
                label: 'Delete Category',
                each: fn (ModelsCategories $c) => $this->validateDeleteCategory($c),
            )
            ->export()
            ->paginate(50);
    }

    private function validateDeleteCategory($c)
    {
        $count = Posts::where('category_id', $c->id)->count();

        if ($count > 0) {
            Toast::warning('Cannot delete category there are posts associated with it!!');

            return redirect()->route('categories.index');
        } else {
            $c->delete();

            Toast::danger('Category deleted!');
        }
    }
}
