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
		$url = 'http://128.199.131.109:3000/api/userdata/transaction_history';
		$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFhejQ3IiwiaWF0IjoxNjUyMTcwNjIyfQ.lpgf2og1fKhQrbSbvwFoAP2KX7p-swTi76FMhX1Z56w';
		$options = array('http' => array(
		    'method'  => 'GET',
		    'header' => 'Authorization: Bearer '.$token
		));
		$context  = stream_context_create($options);
		$response = file_get_contents($url, false, $context);

		dd($response);
	}
}