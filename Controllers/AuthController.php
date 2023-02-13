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
        $registerModel = new User();
        $this->setLayout('auth');
        if($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

}