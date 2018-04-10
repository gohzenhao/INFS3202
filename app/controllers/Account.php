<?php
	/**
	 * 
	 */
	class Account extends Controller{

		/**
		 * Redirects user to login in page if user has not logged in
		 */
		public function __construct(){
			// Check if logged in using session_helper function
			if(!isLoggedIn()) {
				redirect('users/login');
			}

			$this->accountModel = $this->model('AccountModel');
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

		/**
		 * 
		 */
		public function edit(){
			$user = $this->accountModel->getCurrentUser();
			
			$data = [
				'user' => $user
			];
			$this->view('account/edit',$data);
		}
	}
