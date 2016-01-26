<?php

namespace LTF\Http\Controllers\Api\DataTables;

use LTF\Base\Controllers\DataTableController;;
use LTF\User;

class UserDataTable extends DataTableController
{
    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'email', 'ip_address', 'logged_in_at', 'logged_out_at'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = User::query();
        return $this->applyScopes($users);
    }
}