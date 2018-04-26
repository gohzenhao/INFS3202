<?php
	class Recipes extends Controller{
		public function __construct(){
			$this->recipesModel = $this->model('RecipesModel');
		}

		/**
		 * Loads the view recipes page by default, displays a search results page
		 */
		public function index(){
			$users = $this->recipesModel->getUsers();

			$data = [
				'title' => 'Welcome Peasants to the Example page!',
				'users' => $users
			];

			$this->view('recipes/search', $data);
        }
		
		/**
		 * 
		 */
        public function create() {
            
			$this->view('recipes/create');
		}
		
		/**
		 * 
		 */
		public function saverecipe() {
			if(isset($_POST['ingredients'])) {
				print_r($_POST['ingredients']);
			} else {
				echo "not okay";
			}
			if(isset($_POST['directions'])) {
				print_r($_POST['directions']);
			} else {
				echo "not okay";
			}
			
			$target_file = "uploads/" . basename($_FILES["profilePicture"]["name"]);
			echo $target_file;
		}
	}