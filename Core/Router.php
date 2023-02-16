<?php
namespace app\Core;

use app\Controllers\AuthController;
use app\Controllers\SiteController;
use app\Core\exception\NotFoundException;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    public string $layout = 'main';

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            throw new NotFoundException();
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            Application::$app->controller->action = $callback[1];
            $this->layout = Application::$app->controller->layout;
            $callback[0] = Application::$app->controller;

            foreach (Application::$app->controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }
        return call_user_func($callback, $this->request, $this->response);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($Contentview)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $Contentview, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/Views/layouts/$this->layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params=null)
    {
        if($params != null){
            foreach ($params as $key => $value){
                $$key = $value;
            }
        }
        ob_start();
        include_once Application::$ROOT_DIR."/Views/$view.php";
        return ob_get_clean();
    }
}