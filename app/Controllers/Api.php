<?php

namespace App\Controllers;

class Api extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	function getData()
	{
		$url = 'http://128.199.131.109:3000/api/user/login';
		$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFhejQ3Iiwicm9sZSI6IlJPTEVfQURNSU4iLCJpYXQiOjE2NTc5NzMzNTh9.K1Zgec8GHp_R0p_kELdLf_wDCbUaolsJuIVH_yKZJEQ';
		$options = array('http' => array(
		    'method'  => 'POST',
		    'header' => 'Authorization: Bearer '.$token
		));
		$context  = stream_context_create($options);
		$data['title'] = 'transaksi';
		$data['response'] = json_decode(file_get_contents($url, false, $context));

		dd($data['response']);

		// return view('transaksi/index', $data);
	}
}