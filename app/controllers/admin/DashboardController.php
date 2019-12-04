<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 02/12/2019
 * Time: 22.46
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        return view('admin/dashboard');
    }
}