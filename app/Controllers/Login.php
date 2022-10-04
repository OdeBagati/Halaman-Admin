<?php

namespace App\Controllers;

use stdClass;
use CodeIgniter\Cookie\Cookie;
use DateTime;

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
        try
        {
            // API for login
            $url = 'http://128.199.131.109:3000/api/user/login';
            // $url = 'http://128.199.78.209:3000/api/user/login';
        
            $kelas = new stdClass();
            $kelas->username = $this->request->getVar('username');
            $kelas->password = $this->request->getVar('password');
        
            $options = array('http' => array(
                'method'  => 'POST',
                'header' => array(
                    "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10",
                    "Content-type: application/json",
                ),
                'content' => json_encode($kelas)
            ));
            $context  = stream_context_create($options);

            $ingfo = file_get_contents($url, false, $context);

            // helper('cookie');
            $cookie = new Cookie(
                'login',
                $ingfo,
                [
                    'expires'  => new DateTime('+2 hours'),
                    'prefix'   => '',
                    'path'     => '/',
                    'domain'   => '',
                    'secure'   => false,
                    'httponly' => false,
                    'raw'      => false,
                    'samesite' => Cookie::SAMESITE_LAX,
                ]
            );
            $this->response->setCookie('login', $cookie);

            if ($cookie->getValue() != null)
            {
                return redirect()->setCookie($cookie)->to(base_url('/'));
            }
            else
            {
                return redirect()->to('login');
            }
        }
        catch(\Throwable $th)
        {
            $this->session->setFlashData('error', 'invalid username or password');
        
            return view('login/login');
        }
    }

    public function logout()
    {
        helper('cookie');
        delete_cookie('login');

        return view('login/login');
    }
}
