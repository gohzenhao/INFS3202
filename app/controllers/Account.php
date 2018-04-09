<?php
	/**
	 * 
	 */
	class Account extends Controller{
		public function __construct(){
			// Check if logged in using session_helper function
			if(!isLoggedIn()) {
				redirect('users/login');
			}

			$this->testModel = $this->model('AccountModel');
		}

		/**
		 * 
		 */
		public function index(){
			$data = [
				'name' => $_SESSION['user_name']
			];

			$this->view('account/index', $data);
		}
	}