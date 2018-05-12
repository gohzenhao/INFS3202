<?php
    /**
     * User controller which handles login and registration pages
     */
	class Users extends Controller{

        /**
         * Loads UserModel for retrieving users table from db
         * Redirects user to account page if already logged in
         */
		public function __construct(){
            // Check if logged in using session_helper function
			if(isLoggedIn()) {
				redirect('account');
            }

			$this->userModel = $this->model('UserModel');
		}

        /**
         * Handles both loading registration form and submission of form.
         * Loading form: loads form with name, email, username, password, and confirm password
         *      and asssociated error messages
         * Submission of form: validates input and hashes password, then inserts it into
         *      database via model queries. Redirects user to login page once complete with
         *      flash banner saying registration is successful
         */
		public function registration(){
            // Check for POST submission
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validate input data from registration form
                $data = $this->validateRegisterForm();

                // If no errors then successful registration
                if(empty($data['name_error']) && empty($data['email_error']) && 
                        empty($data['username_error']) &&  empty($data['password_error']) && 
                        empty($data['confirm_password_error']) ) {

                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->registerUser($data)) {
                        flash('register_success', 'You are now registered and can login');
                        redirect('users/login');
                        sendConfirmationEmail($data['email']);
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
         * POST method used: validates user email/username and password, if successful will
         *      create new session and calls createUserSession() which will reroute to home page
         */
        public function login() {
            // Check for POST submission
			if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Validate user login form
                $data = $this->validateLoginForm();

                // Make sure errors are empty
                if(empty($data['username_email_error']) && empty($data['password_error'])) {
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['username_email'], $data['password']);
                    if($loggedInUser) {
                        // Create session
                        $this->createUserSession($loggedInUser);
                    } else {
                        // Incorrect password
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
         * Creates user session with user_id, user_name, user_email, user_username variables
         * then redirects to home page
         */
        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['user_name'] = $user->user_name;
            $_SESSION['user_email'] = $user->user_email;
            $_SESSION['user_username'] = $user->user_username;
            redirect('home');
        }

        /**
         * Unsets user_id, user_name, user_email, user_username variables then destroys session
         * and return to home page
         */
        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_username']);
            session_destroy();
            session_start();
            flash('logout_success', 'You have successfully logged out');
            redirect('home');
        }

        /**
         * Sanitizes POST input from form and checks for errors
         * Error messages contained in associative array return value
         * 
         * @return: $data associative array of input and error messages
         */
        private function validateRegisterForm() {
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

            return $data;
        }

        /**
         * Sanitizes POST input from form and checks for erros
         * Error messages conatined in associative array return value
         * 
         * @return: $data associative array of input and error messages
         */
        private function validateLoginForm() {
            // Submit form data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Retrieve data from forms
            $data = [
                'username_email' => trim($_POST['username_email']),
                'password' => trim($_POST['password']),
                'username_email_error' => '',
                'password_error' => ''
            ];
            // Validate email/username
            if(empty($data['username_email'])) {
                $data['username_email_error'] = 'Please enter your username/email';
            }
            // Validate password
            if(empty($data['password'])) {
                $data['password_error'] = 'Please enter your password';
            }

            // Check for existing user with username or email
            if(!($this->userModel->findUserByEmail($data['username_email']) || 
                    $this->userModel->findUserByUsername($data['username_email']))) {
                $data['username_email_error'] = 'No user found';
            }
            return $data;
        }

        /**
         * TODO: use PHPmailer library
         */
        public function sendConfirmationEmail($email) {
            $to = $email;
			// $to      = 'yuliangzhou7@gmail.com';
			$subject = 'Welcome to TheRecipesProject';
			$message = 'Hello user, Welcome to  TheRecipesProject. This is a confirmation of your newly registered account';
			$headers = 'From: TheRecipesProject <noreply@recipesproject.com>\n';
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n";

			mail($to, $subject, $message, $headers);

        }
	}
