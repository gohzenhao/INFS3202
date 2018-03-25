<?php

/**
 * Base Controller class which all controllers in /src/controller/ should extend
 */
class Controller {

    /**
     * Retrieve model
     * TODO: handle error checking for invalid models
     */
    public function model($model) {
        echo $model;

        require_once '../src/models/' . $model . '.php';
        return new $model;
    }

    /**
     * Display view, and view to access $data array variable
     */
    public function view($view, $data = []) {
        require_once '../src/view/' . $view . '.php';
    }
}