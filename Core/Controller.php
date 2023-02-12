<?php

namespace app\Core;

class Controller
{
    public function render($view, $params=null)
    {
        return Application::$app->router->renderView($view, $params);
    }

}