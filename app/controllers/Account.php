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

		public function validateInput(){

			if($_SERVER(REQUEST_METHOD) == 'POST'){

				console.log("Hello");

				$data = $this-> sanitizeInput();

					if(empty($data['name'])){
						$data['error_name'] = "Please enter name";
					}

					if(empty($data['username'])){
						$data['error_username'] = "Please enter username";
					}

					if(empty($data['email'])){
						$data['error_email'] = "Please enter email";
					}else if($this->accountModel->findUserByEmail($data['email'])){
						$data['error_email'] = "Email is already taken";
					}

					if(!empty($data['error_name']) && !empty($data['error_username']) && !empty($data['error_email'])){
						if($this->accountModel->updateProfile($data)){
							flash('update_success',"Profile updated successfully!");
							redirect("account/index");
						}else{
							die("Wot");
						}
					}else{
						$this->view('account/edit',$data);
					}

				}else{
					$data = [
						'name' => '',
						'username' => '',
						'email' => '',
						'error_name' => '',
						'error_username' => '',
						'error_email' => '',
					];

					$this->view('account/edit',$data);
				}

		}
	}
