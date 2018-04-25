<?php

class AccountModel {

	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function getCurrentUser(){
		$this->db->query("SELECT * FROM users WHERE user_name = :username");
		$this->db->bind(':username',$_SESSION['user_name']);
		return $this->db->single();
	}

	public function updateProfile($data){

		$this->db->query("UPDATE users SET user_name = :name, user_username = :username, user_email = :email WHERE user_id = :id");
		$this->db->bind(':name',$data['name']);
		$this->db->bind(':username:',$data['username']);
		$this->db->bind(':email',$data['email']);
		$this->db->bind(':id',$_SESSION['user_id']);
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}

	}

	public function findUserByEmail($email){
		$this->db->query("SELECT * FROM users WHERE user_email = :email");
		$this->db->bind(":email",$email);
		$row = $this->db->single();
		if($this->db->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}




}




 ?>
