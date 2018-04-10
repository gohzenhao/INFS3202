<?php

class Account extends Controller{

  public function __construct(){

    $this->accountModel = $this->model('AccountModel');

  }

  public function edit(){

    $user = $this->accountModel->getCurrentUser();




    $data = [
      'user' => $user
    ];
    $this->view('account/edit',$data);
  }
}






 ?>
