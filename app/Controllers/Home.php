<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function login()
    {
        return view('login/login');
    }

    public function register()
    {
        return view('login/register');
    }

    public function test()
    {
        return view('layout/index');
    }
}
