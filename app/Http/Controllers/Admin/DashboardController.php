<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;

class DashboardController extends AdminController
{

    public function getIndex()
    {
        return view('admin.dashboard.index');
    }
}
