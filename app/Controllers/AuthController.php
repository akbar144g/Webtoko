<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    function __construct()
    {
        helper('form');
    }

    public function login()
    {
        $today = date('Y-m-d');
        $diskonModel = new \App\Models\DiskonModel();
        $diskonHariIni = $diskonModel->where('tanggal', $today)->first();

        if ($diskonHariIni) {
            session()->set('diskon', $diskonHariIni['nominal']);
        }

        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session()->set([
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLoggedIn' => true
                    ]);
                    return redirect()->to('/keranjang');
                } else {
                    session()->setFlashdata('failed', 'Password salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username tidak ditemukan');
                return redirect()->back();
            }
        }

        return view('v_login');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
