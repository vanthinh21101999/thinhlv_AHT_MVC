<?php
namespace My_MVC;

use My_MVC\Request;
use My_MVC\Router;

class Dispatcher
{
    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], $this->request->params); 
    }

    public function loadController()
    {
        $taskcon=$this->request->controller . "Controller";
        $controller="My_MVC\Controllers\\".$taskcon;
        return new $controller();
    }

}
?>