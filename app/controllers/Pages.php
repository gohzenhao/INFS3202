<?php
  class Pages {
    public function __construct(){
		echo 'Welcome';
    }

    public function index(){
      
    }

    public function about($id){
      echo $id;
    }
  }