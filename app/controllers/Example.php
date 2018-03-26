<?php
	class Example extends Controller{
		public function __construct(){
			$this->testModel = $this->model('ExampleModel');
		}

		public function index(){
			$users = $this->testModel->getUsers();

			$data = [
				'title' => 'Welcome Peasants to the Example page!',
				'users' => $users
			];

			$this->view('example/index', $data);
		}

		public function about(){
			$data = ['title' => 'Welcome to Example About page!'];
			$this->view('example/about', $data);
		}
	}