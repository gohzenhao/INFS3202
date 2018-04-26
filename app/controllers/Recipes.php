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
			if(isset($_GET['ingredients'])) {
				echo "OKAYYYY";
				print_r($_GET['ingredients']);
			} else {
				echo "not okay";
			}
		}
	}