<?php

namespace App\Http\Controllers\Backend;

use App\Base\Controllers\AdminController;

class DashboardController extends AdminController
{

    public function getIndex()
    {
        return view('admin.dashboard.index');
    }
}
