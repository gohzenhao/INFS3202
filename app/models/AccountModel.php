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
		$this->db->query('UPDATE users SET user_name = :name, user_username = :username,
			user_email = :email WHERE user_id = :id');

		$this->db->bind(':name', $data['name']);
		$this->db->bind(':username', $data['username']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':id', $data['id']);

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

	public function getRecipes(){
		$this->db->query("SELECT * FROM recipes WHERE ownerid = :id");
		$this->db->bind(":id",$_SESSION['user_id']);
		$row = $this->db->resultSet(true);
		return $row;
	}

	public function deleteRecipe($rid){
		$this->db->query("DELETE FROM recipes WHERE rid= :rid");
		$this->db->bind(":rid",$rid);

		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
		}





}




 ?>
