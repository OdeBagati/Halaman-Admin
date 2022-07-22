<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function index()
    {
        $lomgin = $this->session->get('lomgin');

        if ($lomgin != null) {
            $url = 'http://128.199.131.109:3000/api/userdata/transaction_history';
            $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFhejQ3Iiwicm9sZSI6IlJPTEVfQURNSU4iLCJpYXQiOjE2NTgwNTAzMTl9.a6KnaDbuy5qlLFWkK8EkwfzrBo7Zir5Ycw4SaPJrMwA';
            $options = array('http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $token
            ));
            $context  = stream_context_create($options);
            $data['response'] = json_decode(file_get_contents($url, false, $context));
            $data['page']  = 'test_table';
            $data['title']  = 'Halaman Transaksi';

            // dd($data['response']);

            return view('admin', $data);
        } else {
            return redirect()->to('login');
        }
    }

    function delete()
    {
        $this->session->remove('lomgin');
    }

    function download()
    {
        $url = 'http://128.199.131.109:3000/api/admin/transaction_date_no_paging/' . date('Y-m-d');
        // $url = 'http://128.199.78.209:3000/api/admin/transaction_date_no_paging/2022-07-21';
        // $url = 'http://128.199.131.109:3000/api/userdata/transaction_history';
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFhejQ3Iiwicm9sZSI6IlJPTEVfQURNSU4iLCJpYXQiOjE2NTg0ODA2NTd9.B1xcTwz3SU_pieAD0_EmemGilsGJdsgralQzeXkbC3M';

        $options = array('http' => array(
            'method'  => 'GET',
            'header' => 'Authorization: Bearer ' . $token
        ));
        $context  = stream_context_create($options);
        $response = json_decode(file_get_contents($url, false, $context));
        // dd($url, $response);

        $data = 'Tanggal Trx' . ' | ' . 'Trx Id' . ' | ' . "BillerId" . ' | ' . 'Period' . ' | ' . 'Biller' . ' | ' . 'Amount' . ' | ' . 'Penalty' . ' | ' . 'Total Amount' . ' | ' . 'Fee' . ' | ' . 'Total Bayar' . ' | ' . "\n";
        foreach ($response as $trx_list => $transaksi) {
            $jsonData = json_decode($transaksi->data);
            $data .=  $transaksi->ts . ' | ' . $transaksi->trx_id . ' | ' . $transaksi->product_code . ' | ' . '    -   ' . ' | ' . $transaksi->trx_type . ' | ' . $jsonData->pricing->price . ' | ' . '    -   ' . ' | ' . $jsonData->pricing->price . ' | ' . '   -   ' . ' | ' . $transaksi->amount . ' | ' . "\n";
        }

        // $data = 'Here is some text!';
        $name = 'formatreport.txt';
        return $this->response->download($name, $data);
    }
}
