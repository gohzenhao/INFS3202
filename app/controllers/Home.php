<?php
	class Home extends Controller{
		public function __construct(){
			echo 'Welcome';
		}

		public function index(){
			$data = ['title' => 'Welcome Peasants!'];
			$this->view('home/index', $data);
		}

		public function about(){
			$data = ['title' => 'Welcome to About page!'];
			$this->view('home/about', $data);
		}
	}