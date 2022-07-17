<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    function login()
    {
        return view('login/login');
    }

    function register()
    {
        return view('login/register');
    }

    function test()
    {
        return view('layout/index');
    }
}
