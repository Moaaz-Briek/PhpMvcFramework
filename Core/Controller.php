<?php

namespace app\Core;

class Controller
{
    public string $layout = 'main';
    public function render($view, $params=null)
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

}