<?php
include_once("../database.php");

$db = Database::getInstance();

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($name) || empty($email) || empty($username) || empty($password) ){
    header("Location: ../index.php?signup=error1");
  }
  else{
    if(!preg_match("/^[a-zA-Z]*/",$name)){
      header("Location: ../index.php?signup=error2");
    }
    else{
      $sql = "SELECT * FROM users WHERE user_username = :username";
      $stmt = $db->prepare($sql);
      $stmt->execute(['username'=>$username]);
       // $row = $stmt->fetch();
      $duplicate = $stmt->rowCount();

      if($duplicate>0){
        header("Location: ../index/php?signup=error3");
      }
      else{
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(user_name,user_username,user_email,user_password) VALUES (:name,:username,:email,:password)";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute(['name'=>$name,'username'=>$username,'email'=>$email,'password'=>$hash_password]);

        if($result){
          header("Location: ../index.php?signup=success");
        }
      }


    }
  }
}
else{
  header("Location: ../index.php");
}
?>
