<?php

namespace LTF\Http\Controllers\Api\DataTables;

use LTF\Base\Controllers\DataTableController;
use LTF\Category;

class CategoryDataTable extends DataTableController
{
    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['title', 'color'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $categories = Category::whereLanguageId(session('current_lang')->id);
        return $this->applyScopes($categories);
    }
}
