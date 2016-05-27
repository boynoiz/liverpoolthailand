<?php

namespace LTF\Http\Controllers\Admin;

use LTF\Base\Controllers\AdminController;

class DashboardController extends AdminController
{

    public function getIndex()
    {
        return view('admin.dashboard.index');
    }
}
