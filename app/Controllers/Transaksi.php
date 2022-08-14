<?php

namespace App\Controllers;

use stdClass;
use CodeIgniter\Cookie\Cookie;
use DateTime;

class Transaksi extends BaseController
{
    public function index()
    {
        $lomgin = $this->session->get('lomgin');

        if ($lomgin != null) {
            $url = 'http://128.199.78.209:3000/api/admin/transaction_all/1';
            $token = $lomgin;
            $options = array('http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $token
            ));
            $context  = stream_context_create($options);
            $data['response'] = json_decode(file_get_contents($url, false, $context));
            $data['dataTransaksi'] = $data['response']->data;
            $data['page']  = 'test_table';
            $data['title']  = 'Halaman Transaksi';

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
        $lomgin = $this->session->get('lomgin');

        if ($this->request->getMethod('post')) {
            $rules = [
                'date' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'  => 'Order date is required'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $dateSelected = $this->request->getPost('date');

                $url = 'http://128.199.78.209:3000/api/admin/transaction_date_no_paging/' . $dateSelected;
                // $url = 'http://128.199.78.209:3000/api/admin/transaction_date_no_paging/2022-07-21';
                // $url = 'http://128.199.131.109:3000/api/userdata/transaction_history';
                $token = $lomgin;

                $options = array('http' => array(
                    'method'  => 'GET',
                    'header' => 'Authorization: Bearer ' . $token
                ));
                $context  = stream_context_create($options);
                $response = json_decode(file_get_contents($url, false, $context));

                $data = 'Tanggal Trx' . ' | ' . 'Trx Id' . ' | ' . "BillerId" . ' | ' . 'Period' . ' | ' . 'Biller' . ' | ' . 'Amount' . ' | ' . 'Penalty' . ' | ' . 'Total Amount' . ' | ' . 'Fee' . ' | ' . 'Total Bayar' . ' | ' . "\n";
                foreach ($response as $trx_list => $transaksi) {
                    $jsonData = json_decode($transaksi->data);
                    $data .=  $transaksi->ts . ' | ' . $transaksi->trx_id . ' | ' . $transaksi->product_code . ' | ' . '    -   ' . ' | ' . $transaksi->trx_type . ' | ' . $jsonData->pricing->price . ' | ' . '    -   ' . ' | ' . $jsonData->pricing->price . ' | ' . '   -   ' . ' | ' . $transaksi->amount . ' | ' . "\n";
                }

                // $data = 'Here is some text!';
                $name = 'formatreport.txt';
                return $this->response->download($name, $data);
                return redirect()->back();
            } else {
                echo "kasi tanggal dong";
            }
        } else {
            echo "belum ada method post gan";
        }
    }

    function changeStatus($trx_id)
    {
        $lomgin = $this->session->get('lomgin');
        $status = $this->request->getVar('status');

        $ubahStatus = new stdClass();
        $ubahStatus->trx_id = intval($trx_id);
        $ubahStatus->amount = intval($this->request->getVar('amount'));

        // dd($trx_id, $status, $ubahStatus->amount);

        // $ubahStatus->status = 'reject';

        $url = 'http://128.199.78.209:3000/api/admin/payment_' . $status;
        // dd($url);
        $token = $lomgin;
        $options = array('http' => array(
            'method'  => 'POST',
            'header' => array(
                "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10",
                "Content-type: application/json",
                "Authorization: Bearer " . $token
            ),
            'content' => json_encode($ubahStatus)
        ));
        $context  = stream_context_create($options);
        $response = json_decode(file_get_contents($url, false, $context));

        // dd($response);
        return redirect()->back();
    }
}
