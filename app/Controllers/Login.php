<?php

namespace App\Controllers;

use stdClass;

class Login extends BaseController
{
    public function login()
    {
        return view('login/login');
    }

    public function register()
    {
        return view('login/register');
    }

    public function loginAuth()
    {
        // API login disini
        $url = 'http://128.199.131.109:3000/api/user/login';

        // $ch = curl_init($url);
        // # Setup request to send json via POST.
        // $payload = json_encode(array("cust_id" => "546500120910"));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // # Return response instead of printing.
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // # Send request.
        // $result = curl_exec($ch);
        // curl_close($ch);

        // dd($result);


        $kelas = new stdClass();
        $kelas->username = "aaz47";
        $kelas->password = "contohdoang";
        // dd(json_decode('{"cust_id": "546500120910"}'));

        $postdata = ["cust_id" => "546500120910"];
        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFhejQ3Iiwicm9sZSI6IlJPTEVfQURNSU4iLCJpYXQiOjE2NTc5NzMzNTh9.K1Zgec8GHp_R0p_kELdLf_wDCbUaolsJuIVH_yKZJEQ";
        $options = array('http' => array(
            'method'  => 'POST',
            'header' => array(
                "Authorization: Bearer " . $token,
                "Content-type: application/json",
            ),
            'content' => json_encode($kelas)
        ));
        $context  = stream_context_create($options);

        dd(json_decode(file_get_contents($url, false, $context)));

        // Validasi login disini

        // $username = $this->request->getVar("username");
        // $password = md5($this->request->getVar("password"));

        // dd($username, $password);
    }
}
