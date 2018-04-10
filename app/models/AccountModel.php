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




}




 ?>
