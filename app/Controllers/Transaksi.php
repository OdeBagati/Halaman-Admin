<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function index()
    {
        $url = 'http://128.199.131.109:3000/api/userdata/transaction_history';
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFhejQ3Iiwicm9sZSI6IlJPTEVfQURNSU4iLCJpYXQiOjE2NTgwNTAzMTl9.a6KnaDbuy5qlLFWkK8EkwfzrBo7Zir5Ycw4SaPJrMwA';
        $options = array('http' => array(
            'method'  => 'GET',
            'header' => 'Authorization: Bearer '.$token
        ));
        $context  = stream_context_create($options);
        $data['title'] = 'transaksi';
        $data['response'] = json_decode(file_get_contents($url, false, $context));

        $data['page']  = 'test_table';
        $data['title']  = 'Halaman Transaksi';

        // dd($data['response']);

        return view('admin',$data);

        // foreach ($data['response'] as $key => $value) {
        //     echo $value->ts;
        //     echo $value->trx_type;
        //     echo $value->trx_id;
        //     echo $value->product_code;
        //     echo $value->amount;
        //     echo $value->status;
        // }
    }

    function dumy()
    {
        $data['dummy'] = array(
            '0' => [
                'tgl_transaksi' => '20/10/2020',
                'biller' => 'PT XYZ',
                'trx_id' => '123456',
                'bill_id' => '123',
                'bayar' => '69000',
                'status' => 'berhasil'
            ],
            '1' => [
                'tgl_transaksi' => '20/10/2020',
                'biller' => 'PT XYZ',
                'trx_id' => '123456',
                'bill_id' => '123',
                'bayar' => '69000',
                'status' => 'pending'
            ],
            '2' => [
                'tgl_transaksi' => '20/10/2020',
                'biller' => 'PT XYZ',
                'trx_id' => '123456',
                'bill_id' => '123',
                'bayar' => '69000',
                'status' => 'gagal'
            ],
            '3' => [
                'tgl_transaksi' => '20/10/2020',
                'biller' => 'PT XYZ',
                'trx_id' => '123456',
                'bill_id' => '123',
                'bayar' => '69000',
                'status' => 'berhasil'
            ],
            '4' => [
                'tgl_transaksi' => '20/10/2020',
                'biller' => 'PT XYZ',
                'trx_id' => '123456',
                'bill_id' => '123',
                'bayar' => '69000',
                'status' => 'pending'
            ],
            '5' => [
                'tgl_transaksi' => '20/10/2020',
                'biller' => 'PT XYZ',
                'trx_id' => '123456',
                'bill_id' => '123',
                'bayar' => '69000',
                'status' => 'gagal'
            ]
        );
    }
}
