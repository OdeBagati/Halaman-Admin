<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $lomgin=$this->session->get('lomgin');

        if($lomgin != null)
        {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('dashboard/index', $data);
        }
        else
        {
            return redirect()->to('login');
        }
    }
}
