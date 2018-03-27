<?php
	class Home extends Controller{
		public function __construct(){
			
		}

		public function index(){
			$data = ['title' => 'Welcome User!'];
			$this->view('home/index', $data);
		}

		public function about(){
			$data = ['title' => 'Welcome to the About page!'];
			$this->view('home/about', $data);
		}
	}