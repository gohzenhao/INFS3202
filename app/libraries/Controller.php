<?php
    /**
     * All controllers extend this base controller class.
     */
    class Controller {
        
        /**
         * Loads Model from /app/models/x.php where x is the model name
         * param: model name
         * returns: Model
         */
        public function model($model) {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        }

        /**
         * Loads view
         * param: name of view, array of data to pass to view
         */
        public function view($view, $data = []) {
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die('Failed to find view (Doesn\'t exist)');
            }
        }
    }
