<?php
    /* App core class
    * Creates URl & loads core controller
    * URL FORMAT -/controller/method/params
    */
    class core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        // print the array created from url
        // print_r($this->getUrl());

        $url = $this->getUrl();

        if(empty($url)){
            $url[0] = 'index';
        }

        // Look in the controllers for first value
        if (file_exists('../App/Controllers/' . ucwords($url[0]) . '.php')) {
            // if exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset the zero index
            unset($url[0]);
        }

        // Require the controller
        require_once '../App/Controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if (isset($url[1])){
            // Check if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];

                // Unset 1 index
                unset($url[1]);
            }
        }
        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            //split the url by the slash
            $url = rtrim($_GET['url'], '/');
            // separate url based on the slash
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // transform the url to an array
            $url = explode('/', $url);
            return $url;

        }
    }
    }
?>