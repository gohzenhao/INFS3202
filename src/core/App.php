<?php

/**
 * Main application controller/rerouter. Only instantiated in index.php
 */
class App {

    // Default controller
    protected $controller = 'home';
    // Default action to run
    protected $action = 'index';

    protected $params = [];

    public function __construct() {

        $url = $this->parseUrl();
        print_r($url);

        // Get controller if set
        if (file_exists('../src/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../src/controller/' . $this->controller . ".php";
        $this->controller = new $this->controller;

        // Get action for controller if set
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            }
        }

        // If no parameters to url then set to empty
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    /**
     * 
     */
    public function parseUrl() {
        if(isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}