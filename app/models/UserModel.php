<?php

    /**
     * Handles all user registration and login
     */
    class UserModel {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        /**
         * Inserts a new user into the database
         * return: true on success, false on fail
         */
        public function registerUser($data) {
            // Prepare sql query
            $this->db->query('INSERT INTO users (user_name,user_username,user_email,user_password) VALUES(:name,:username,:email,:password)');
            // Bind values for prepared statement
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Login in a user via username or email
         * return: user data row from sql on success, false on fail
         */
        public function login($username, $password) {
            $this->db->query('SELECT * FROM users WHERE user_email = :email OR user_username = :username');
            $this->db->bind(':email', $username);
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            $hashed_password = $row->user_password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        /**
         * Find user by email
         * return: boolean
         */
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE user_email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Find user by username
         * return: boolean
         */
        public function findUserByUsername($username) {
            $this->db->query('SELECT * FROM users WHERE user_username = :username');
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
