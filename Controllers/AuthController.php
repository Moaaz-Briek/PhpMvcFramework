<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if($request->isPost()) {
            return 'Handle submitted';
        }
        return $this->render('register');
    }

}