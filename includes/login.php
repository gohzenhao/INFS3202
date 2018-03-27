<?php
session_start();
include_once("../database.php");

$db = Database::getInstance();

if(isset($_POST['submit'])){

  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  $sql = "SELECT * FROM users WHERE user_username = :username";
  $stmt = $db->prepare($sql);
  $stmt->execute(['username'=>$username]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $found = $stmt->rowCount();
  if($row['user_id']>0){

      $result = password_verify($password,$row['user_password']);

      if($result){
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_username'] = $row['user_username'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_email'] = $row['user_email'];

        header("Location: ../index.php?login=success");

      }else{

        header("Location: ../index.php?login=error1");

      }


  }else{
     header("Location: ../index.php?login=error1");
  }



}else{
  echo 'wut';
}



 ?>
