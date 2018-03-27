<?php
	class User extends Controller{
		public function __construct(){
			
		}

		public function registration(){
			
			$data = [
				'title' => 'Registration Form!'
			];

			$this->view('user/registration', $data);
		}
	}