<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Transaksi'
        ];
        return view('transaksi/index', $data);
    }
}
