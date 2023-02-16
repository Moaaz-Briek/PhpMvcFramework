<?php

namespace app\Core;

class View
{
    public string $title = '';

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
        $layout = Application::$app->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/Views/layouts/$layout.php";
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