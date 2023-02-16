<?php

namespace app\Core;

use app\Core\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';

    /**
     * @var BaseMiddleware[]
     */
    protected array $middlewares = [];
    public string $action = '';

    public function render($view, $params=null)
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }


}