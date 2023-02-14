<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Request;
use app\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $userModel = new User();
        $this->setLayout('auth');
        if($request->isPost()) {
            $userModel->loadData($request->getBody());
            if ($userModel->validate() && $userModel->register()) {
                return 'Success';
            }
            return $this->render('register', [
                'model' => $userModel
            ]);
        }
        return $this->render('register', [
            'model' => $userModel
        ]);
    }

}