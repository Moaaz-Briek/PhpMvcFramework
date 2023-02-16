<?php

namespace app\Core\middlewares;

use app\Core\Application;
use app\Core\exception\ForbiddenException;

class SiteMiddleware extends BaseMiddleware
{
    protected array $actions = [];
    public function __construct(array $actions)
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (empty($this->actions) /*Means that the middleware is work for every action*/ || in_array(Application::$app->controller->action, $this->actions)) {
            throw new ForbiddenException();
        }
    }

}