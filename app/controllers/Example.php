<?php
	class Example extends Controller{
		public function __construct(){
			$this->testModel = $this->model('ExampleModel');
		}

		/**
		 * Loads data from model and renders view with model's data as input
		 */
		public function index(){
			$users = $this->testModel->getUsers();

			$data = [
				'title' => 'Welcome Peasants to the Example page!',
				'users' => $users
			];

			$this->view('example/example', $data);
		}
	}