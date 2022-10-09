<?php

namespace App\Controllers;

use stdClass;
use CodeIgniter\Cookie\Cookie;
use DateTime;

class Dashboard extends BaseController
{
    function __construct()
    {
        helper('cookie');
    }
    public function index()
    {
        $lomgin=get_cookie('login');

        if($lomgin != null)
        {
            $data = [
                'title' => 'Dashboard',
                'page' => 'homepage'
            ];
            return view('admin', $data);
        }
        else
        {
            return redirect()->to('login');
        }
    }
}
