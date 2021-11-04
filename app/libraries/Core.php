<?php

  //Core App Class
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    
    public function __construct() {
      $url = $this->getUrl();
      //Searches 'controllers', ucwords capitalizes first letter
      if (file_exists('../app/controllers/'. ucwords($url[0]).'.php')) {
        $this->currentController = ucwords($url[0]);
        unset($url[0]);
      }

      //Require the controller
      require_once '../app/controllers/' . $this->currentController . '.php';
      $this->currentController = new $this->currentController;
      //Defines method
      if (isset($url[1])) {
        if (method_exists($this->currentController, $url[1])) {
          $this->currentMethod = $url[1];
          unset($url[1]);
        }
      }
      //If needed param checker can be added

      //Makes a callback
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
    public function getUrl() {
      if(isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        //Will filter variables as strings/numbers
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //breaks it into an array
        $url = explode('/',$url);
        return $url;
      }
    }
  }