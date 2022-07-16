<?php

namespace App\Controllers;

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
        // Validasi login disini

        $username = $this->request->getVar("username");
        $password = md5($this->request->getVar("password"));

        dd($username, $password);
    }
}
