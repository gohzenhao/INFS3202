<?php
	class Recipes extends Controller{
		public function __construct(){
			$this->recipesModel = $this->model('RecipesModel');
		}

		/**
		 * Loads the view recipes page by default, displays a search results page
		 */
		public function index(){
			$data = [
				'title' => 'Welcome Search Recipe Page!'
			];

			$this->view('recipes/search', $data);
        }
		
		/**
		 * 
		 */
        public function create() {
			// Check if logged in
			if(!isLoggedIn()) {
				redirect('users/login');
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$data = $this->sanitizeInput();
				// Check for empty input
				if(empty($data['title'])) {
                    $data['title_error'] = 'Please enter the name of your recipe';
				}
				if(empty($data['description'])) {
                    $data['description_error'] = 'Please enter a description of your recipe';
				}
				if(empty($data['prepTime'])) {
                    $data['prepTime_error'] = 'Please enter the time taken to prepare';
				}
				if(empty($data['servingSize'])) {
                    $data['servingSize_error'] = 'Please enter the serving size';
				}

				// Check for at least 1 non empty ingredient, max 25 ingredients
				$hasIngredients = false;
				for($i = 0; $i < count($data['ingredients']); $i++ ) {
					//echo '</br>#'.$i.' = '. $data['ingredients'][$i].'#';
					if(!empty($data['ingredients'][$i])) {
						$hasIngredients = true;
					}
				}
				if(!$hasIngredients) {
					$data['ingredients_error'] = 'Please enter at least 1 ingredient';
				}
				if(count($data['ingredients']) > 25) {
					$data['ingredients_error'] = 'Sorry no more than 25 ingredients allowed';
				}

				// Check for at least 1 non empty step, max 20 steps in directions
				$hasDirections = false;
				for($i = 0; $i < count($data['directions']); $i++ ) {
					//echo '</br>#'.$i.' = '. $data['directions'][$i].'#';
					if(!empty($data['directions'][$i])) {
						$hasDirections = true;
					}
				}
				if(!$hasDirections) {
					$data['directions_error'] = 'Please enter at least 1 step in directions';
				}
				if(count($data['directions']) > 20) {
					$data['directions_error'] = 'Sorry no more than 20 steps allowed';
				}

				print_r($data);
				if(empty($data['title_error']) && empty($data['description_error']) && 
					empty($data['prepTime_error']) && empty($data['servingSize_error']) && 
					empty($data['ingredients_error']) && empty($data['directions_error'])){
						// Can now upload to db TODO
						$this->recipesModel->createNewRecipe($data);
				} else {
					// Display form with errors
					// TODO: handle reloading ingredients and directions lists
					$this->view('recipes/create', $data);
				}
			}else{
				$data = [
					'title' => '',
					'description' => '',
					'prepTime' => '',
					'servingSize' => '',
					'ingredients' => '',
					'directions' => '',
					
					'title_error' => '',
					'description_error' => '',
					'prepTime_error' => '',
					'servingSize_error' => '',
					'ingredients_error' => '',
					'directions_error' => ''
				];
				$this->view('recipes/create', $data);
			}
		}

		/**
		 * 
		 */
		private function sanitizeInput() {
            // Santise POST data from form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Retrieve data from forms
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['desc']),
                'prepTime' => trim($_POST['prepTime']),
				'servingSize' => trim($_POST['servingSize']),
				'ingredients' => $_POST['ingredients'],
				'directions' => $_POST['directions'],
                'title_error' => '',
                'description_error' => '',
                'prepTime_error' => '',
				'servingSize_error' => '',
				'ingredients_error' => '',
				'directions_error' => ''
            ];
            return $data;
        }

	}