<?php
namespace app\Controllers;

use app\Core\Application;

class SiteController
{
    public static function home()
    {
        $params = [
            'name' => 'Moaaz',
            'age' => '27'
        ];
        return Application::$app->router->renderView('home', $params);
    }

    public static function contact()
    {
        return Application::$app->router->renderView('contact');
    }

    public static function handleContact()
    {
        return 'Handling';
    }

}