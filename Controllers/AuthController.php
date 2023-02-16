<?php

namespace app\Controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\middlewares\AuthMiddleware;
use app\Core\Request;
use app\Core\Response;
use app\Models\LoginForm;
use app\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()) {
                $this->setLayout('auth');
                $response->redirect('/');
                return;
            }
        }
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering!');
                $this->setLayout('auth');
                Application::$app->response->redirect('/');
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }

}