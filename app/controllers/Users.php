<?php
	class Users extends Controller{

		public function __construct(){
			$this->userModel = $this->model('User');
		}

        /**
         * 
         */
		public function registration(){
            // Check for POST submission
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Submit form data
                $data = $this->sanitizeInput();
                // Validate name
                if(empty($data['name'])) {
                    $data['name_error'] = 'Please enter your name';
                }
                // Validate email
                if(empty($data['email'])) {
                    $data['email_error'] = 'Please enter your email';
                } else {
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_error'] = 'Email is already taken';
                    }
                }
                // Validate username
                if(empty($data['username'])) {
                    $data['username_error'] = 'Please enter a username';
                }
                // Validate password
                if(empty($data['password'])) {
                    $data['password_error'] = 'Please enter a password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_error'] = 'Password must be at least 6 characters in length';
                }
                // Validate confirm password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_error'] = 'Please confirm your password';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_error'] = 'Passwords do not match';
                    }
                }
                // If no errors then successful registration
                if(empty($data['name_error']) && empty($data['email_error']) && empty($data['username_error']) &&  empty($data['password_error']) && empty($data['confirm_password_error']) ) {
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->registerUser($data)) {
                        flash('register_success', 'You are now registered and can login');
                        redirect('users/login');
                    } else {
                        die("Something went wrong with registration...");
                    }
                } else {
                    // Load view with errors
                    $this->view('users/registration', $data);
                }
                
            } else {
                // Display new registration form
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
        
        /**
         * Handles loading new login view or handles login if login POST method is used
         */
        public function login() {
            // Check for POST submission
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Submit form data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // Retrieve data from forms
                $data = [
                    'username_email' => trim($_POST['username_email']),
                    'password' => trim($_POST['password']),
                    'username_email_error' => '',
                    'password_error' => ''
                ];
                // Validate email
                if(empty($data['username_email'])) {
                    $data['username_email_error'] = 'Please enter your username/email';
                }
                // Validate password
                if(empty($data['password'])) {
                    $data['password_error'] = 'Please enter your password';
                }

                // Check for existing user with username or email
                if(!($this->userModel->findUserByEmail($data['username_email']) || $this->userModel->findUserByUsername($data['username_email']))) {
                    $data['username_email_error'] = 'No user found';
                }

                // Make sure errors are empty
                if(empty($data['username_email_error']) && empty($data['password_error'])) {
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['username_email'], $data['password']);
                    if($loggedInUser) {
                        // Create session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_error'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }
            } else {
                // Display registration form
                $data = [
                    'username_email' => '',
                    'password' => '',
                    'username_email_error' => '',
                    'password_error' => '',
                ];
    
                $this->view('users/login', $data);
            }
        }

        /**
         * 
         */
        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['user_name'] = $user->user_name;
            $_SESSION['user_email'] = $user->user_email;
            $_SESSION['user_username'] = $user->user_username;
            redirect('home');
        }

        /**
         * 
         */
        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_username']);
            session_destroy();
            flash('logout_success', 'You have successfully logged out');
            redirect('home');
        }

        /**
         * Check if user is logged in
         * return: true if logged in, false otherwise
         */
        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            }
            return false;
        }

        /**
         * Sanitizes POST input from form and returns associative array for each input field 
         * and its associated error message
         */
        private function sanitizeInput() {
            // Santise POST data from form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Retrieve data from forms
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'username_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];
            return $data;
        }
	}