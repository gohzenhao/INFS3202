<?php
  class Pages extends Controller{
    public function __construct(){
		echo 'Welcome';
    }

    public function index(){
		$data = ['title' => 'Welcome Peasants!'];
    	$this->view('home/index', $data);
    }

    public function about(){
		$this->view('home/about');
    }
  }