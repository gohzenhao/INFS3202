<?php

    class User {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        /**
         * 
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
         * Find user by email
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
    }