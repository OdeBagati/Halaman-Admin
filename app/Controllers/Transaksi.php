<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function index()
    {
        $data['page']  = 'test_table';
        $data['title']  = 'Halaman Transaksi';

        return view('admin',$data);
    }
}
