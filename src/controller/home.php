<?php

/**
 * 
 */
class Home extends Controller{

    public function index($name = '') {
        
        $this->view('home/test', ['name' => 'BOBBY BROWN']);
    }


}