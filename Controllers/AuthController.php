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
        $user = new User();
        $this->setLayout('auth');
        if($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                return 'Success';
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

}