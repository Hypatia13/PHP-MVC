<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 02/12/2019
 * Time: 22.46
 */

namespace App\Controllers\Admin;

use App\Classes\Request;
use App\Classes\Session;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        Session::add('crowley', 'Welcome, Crowley!');

        if (Session::has('crowley')) {
            $msg = Session::get('crowley');
        } else {
            $msg = "Not defined";
        }

        //Pass $data array to a view and array keys are available as variables
        return view('admin/dashboard', ['crowley' => $msg]);

    }

    public function get()
    {
        $result = Request::all();
        var_dump($result);

    }
}