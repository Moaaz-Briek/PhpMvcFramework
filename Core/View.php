<?php

namespace app\Core;

class View
{
    public string $title = '';

    public function view($view, $params = [])
    {
        $view = $this->renderView($view, $params);
        $layout = $this->renderLayout();
        return str_replace('{{content}}', $view, $layout);
    }

    public function renderContent($view)
    {
        $layout = $this->renderLayout();
        return str_replace('{{content}}', $view, $layout);
    }

    protected function renderLayout()
    {
        $layout = Application::$app->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/Views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderView($view, $params=null)
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