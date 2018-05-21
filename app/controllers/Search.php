<?php
	class Search extends Controller{
		public function __construct(){
			$this->recipesModel = $this->model('RecipesModel');
		}

		/**
		 * Loads the view recipes page by default, displays a search results page
         * Uses GET to handle searching (allows book marking of search page)
		 */
		public function index(){
            if(isset($_GET['query'])) {
                $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
                $query = trim($_GET['query']);

                $recipes = $this->recipesModel->searchRecipes($query);

                $data = [
                    'title' => 'Welcome Search Recipe Page!',
                    'query' => $query,
                    'recipes' => $recipes
                ];

                $this->view('includes/header');
                $this->view('search/search', $data);
                $this->view('includes/footer');
                $this->script('search/search');
            } else {
                $recipes = $this->recipesModel->getAllRecipes();

                $data = [
                    'title' => 'Welcome Search Recipe Page!',
                    'query' => '',
                    'recipes' => $recipes
                ];

                $this->view('includes/header');
                $this->view('search/search', $data);
                $this->view('includes/footer');
                $this->script('search/search');
            }
        }


	}
