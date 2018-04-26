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
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$data = $this->sanitizeInput();

				if(empty($data['name'])){
					$data['error_name'] = "Please enter name";
				}

				if(empty($data['username'])){
					$data['error_username'] = "Please enter username";
				}

				if(empty($data['email'])){
					$data['error_email'] = "Please enter email";
				}else if($this->accountModel->findUserByEmail($data['email'])) {
					if($data['email']!=$_SESSION['user_email']){
						$data['error_email'] = "Email is already taken";
					}
				}

				if(empty($data['error_name']) && empty($data['error_username']) && empty($data['error_email'])){
					if($this->accountModel->updateProfile($data)){
						$this -> updateSession($data);
						flash('update_success', "Profile updated successfully!");
						redirect("account/index");
					}else{
						die("Failed to update user profile");
					}
				}else{
					// Display errors
					$this->view('account/edit',$data);
				}

			}else{
				$data = [
					'id' => $_SESSION['user_id'],
					'name' => $_SESSION['user_name'],
					'username' => $_SESSION['user_username'],
					'email' => $_SESSION['user_email'],
					'error_name' => '',
					'error_username' => '',
					'error_email' => '',
				];

				$this->view('account/edit',$data);
			}

		}

		private function sanitizeInput() {
				// Santise POST data from form
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				// Retrieve data from forms
				$data = [
					'id' => $_SESSION['user_id'],
					'name' => trim($_POST['name']),
					'username' => trim($_POST['username']),
					'email' => trim($_POST['email']),
					'error_name' => '',
					'error_username' => '',
					'error_email' => '',
				];
				return $data;
		}

		private function updateSession($data){

			$_SESSION['user_name'] = $data['name'];
			$_SESSION['user_username'] = $data['username'];
			$_SESSION['user_email'] = $data['email'];
		}
	}
