<?php
class Controller {
    public function model($model) {
        require_once './model/'.$model.'.php';
        return new $model();
    }

    public function view($url, $context = []) {
        if(file_exists('./view/'.$url.'.php')) {
            require_once './view/'.$url.'.php';
        } else {
            die('view not found');
        }
    }
}