<?php

namespace App\Controllers;

use stdClass;
use CodeIgniter\Cookie\Cookie;
use DateTime;
use Kint\Zval\Value;

use function PHPUnit\Framework\isNull;

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
        // API for login
        $url = 'http://128.199.78.209:3000/api/user/login';

        $kelas = new stdClass();
        $kelas->username = $this->request->getVar('username');
        $kelas->password = $this->request->getVar('password');

        if($kelas->username!='aaz47' && $kelas->password!='contohdoang')
        {
            $this->session->setFlashData('error','invalid username or password');

            return view('login/login');
        }
        else
        {
            $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFhejQ3Iiwicm9sZSI6IlJPTEVfQURNSU4iLCJpYXQiOjE2NTc5NzMzNTh9.K1Zgec8GHp_R0p_kELdLf_wDCbUaolsJuIVH_yKZJEQ";
            $options = array('http' => array(
                'method'  => 'POST',
                'header' => array(
                    "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10",
                    "Content-type: application/json",
                ),
                'content' => json_encode($kelas)
            ));
            $context  = stream_context_create($options);

            // dd(file_get_contents($url, false, $context));
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
            $this->response->setCookie('login',$cookie);

            $cookieData = $this->response->getCookie('login');
            // dd($cookieData->getValue());
            // echo $cookieData->getValue() == null;
            if ($cookieData->getValue() != null) {
                $this->session->set('lomgin',$cookieData->getValue());
                return redirect()->setCookie($cookie)->to(base_url('/'));
            } else {
                // return redirect()->to(base_url('/'));
                return redirect()->to('login');
            }
        }


        // if(is_null($this->response->getCookie('login')))
        // {
        //     echo 'gbs';
        // }
        // else
        // {
        //     echo "bs";
        // }

        // return redirect()->to(base_url());

        // Validasi login disini

        // $username = $this->request->getVar("username");
        // $password = md5($this->request->getVar("password"));

        // dd($username, $password);
    }
}
