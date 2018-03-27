<?php
	class Users extends Controller{
		public function __construct(){
			
		}

		public function registration(){
            // Check for POST submission
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Submit form data

            } else {
                // Display registration form
                $data = [
                    'name' => '',
                    'email' => '',
                    'username' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'username_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => '',
                ];
    
                $this->view('users/registration', $data);
            }
		}
	}