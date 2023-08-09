<?php

class App {
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];
    public function __construct() {
        $url = $this->parseUrl();

        if ($url !== null) {
            if ($url[0] !== '') {
                if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                    $this->controller = $url[0];
                    unset($url[0]);
                } else {
                    // Controller not found, throw a 404 error
                    header("HTTP/1.0 404 Not Found");
                    echo "404 Page Not Found.";
                    // $this->renderView('404');
                    return;
                }
            }
        }

        require_once '../app/controllers/'. $this->controller .'.php';
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]); 
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            return $url;
        }

        return null;
    } 

}