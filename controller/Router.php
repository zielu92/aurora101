<?php

class Router {
    protected $page = 'Article';
    protected $method = 'index';
    protected $prams = [];

    public function __construct() {
        $url = $this->url();
        if(file_exists(ucwords($url[0]).'.php')) {
            $this->page = ucwords($url[0]);
            unset($url[0]);
        }
        require_once($this->page.'.php');
        $this->page = new $this->page;
        if(isset($url[1])) {
            if(method_exists($this->page, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->prams = $url ? array_values($url) : [];
        call_user_func([$this->page, $this->method], $this->prams);
    }

    public function url() {
        if(isset($_GET['url'])) {
            $url = $this->pruneURL($_GET['url']);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function pruneURL(string $url) {
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return $url;
    }
}