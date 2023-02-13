<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Request;
use app\Models\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        $this->setLayout('auth');
        if($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate()) {
                return 'Success';
            }
            echo '<pre>';
            var_dump($registerModel->errors);
            echo '</pre>';
            exit();
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

}