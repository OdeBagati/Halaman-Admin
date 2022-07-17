<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['page']  = 'test_table';
        $data['title']  = 'Halaman Transaksi';

        return view('admin',$data);
    }

    public function test()
    {
        return view('layout/index');
    }
}
