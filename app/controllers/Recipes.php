<?php
	class Recipes extends Controller{
		public function __construct(){
			$this->recipesModel = $this->model('RecipesModel');
		}

		/**
		 * Loads the view recipes page by default, displays a search results page
		 */
		public function index(){
			$recipes = $this->recipesModel->getAllRecipes();

			$data = [
				'title' => 'Welcome Search Recipe Page!',
				'recipes' => $recipes
			];

			$this->view('recipes/search', $data);
        }

		/**
		 * Handles both loading form page for users to create a new recipe as well
		 * as submitting recipe form data via POST method.
		 *
		 */
        public function create() {
			// Check if logged in
			if(!isLoggedIn()) {
				redirect('users/login');
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Validate input function
				$data = $this->validateCreateRecipe();

				// If no errors then upload
				if(empty($data['title_error']) && empty($data['description_error']) &&
						empty($data['prepTime_error']) && empty($data['servingSize_error']) &&
						empty($data['ingredients_error']) && empty($data['directions_error']) &&
						empty($data['img_error']) && empty($data['link_error']) ){
					// Upload image
					$data['img'] = $_FILES['imgPreview'];
					// Append user id to upload data
					$data['uid'] = $_SESSION['user_id'];
					// Upload recipe to database
					if($this->recipesModel->createNewRecipe($data)) {
						// TODO: show recipe? or return to account page?
						redirect('recipes/index');
					} else {
						// PDOException was thrown
						$this->view('recipes/create', $data);
					}
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
					'link' => '',

					'title_error' => '',
					'description_error' => '',
					'prepTime_error' => '',
					'servingSize_error' => '',
					'ingredients_error' => '',
					'directions_error' => '',
					'img_error' => '',
					'link_error' => ''
				];
				$this->view('recipes/create', $data);
			}
		}

		/**
		 * Sanitizes to avoid form injection in recipe creation page
		 *
		 * @return: $data
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
				'link' => $_POST['youtubeLink'],
                'title_error' => '',
                'description_error' => '',
                'prepTime_error' => '',
				'servingSize_error' => '',
				'ingredients_error' => '',
				'directions_error' => '',
				'img_error' => '',
				'link_error' => ''
            ];
            return $data;
		}

		/**
		 * Verifies input data from recipes create form and assigns error message if any required
		 *
		 * @return: $data for form data with error messages
		 */
		private function validateCreateRecipe() {
			// Check input for injections
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

			// Check image upload
			$data['img_error'] = $this->checkImageUpload($_FILES['imgPreview']);

			//Check youtube link
			$pattern = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/';
			$url = $data['link'];
			if(!empty($data['link'])){
				if(preg_match($pattern,$url,$matches)){

					$data['link'] = $matches[2];

				}
				else{
					$data['link_error'] = 'Please enter a valid Youtube link';
				}
			}

			return $data;
		}

		/**
		 * Checks image for:
		 * 	- size < 2MB
		 *  -
		 * @param: $_FILES['imageName']
		 * @return: empty string on valid image OR
		 * 			string error message
		 */
		private function checkImageUpload($imgTemp) {
			if($imgTemp['size'] > 2097152) {
				return 'Please select an image less than 2MB';
			}
			if($imgTemp['error'] > 0 && $imgTemp['error'] != 4) {
				return 'File has an error (Error: '.$imgTemp['error'].')';
			}
			return '';
		}


		/**
		 * Displays recipe based on recipe id, if none is provided, redirect to recipe/search page
		 *
		 * If user is not logged in do not display comments section
		 */
		public function display($recipeID = null) {
			// Redirect to recipe search page (default) if no recipe id is provided
			if($recipeID == null) {
				redirect('recipes');
			}

			// Get recipe data
			$recipeData = $this->recipesModel->getRecipeData($recipeID);

			// If recipe does not exist redirect to search page
			if($recipeData == null) {
				redirect('recipes');
			}

			$comments = $this->recipesModel->getAllComments($recipeID);

			// Display recipe by recipe id
			$data = [
				'rid' => $recipeID,
				'title' => $recipeData->title,
				'ownerid' => $recipeData->owner_username,
				'description' => $recipeData->description,
				'prepTime' => $recipeData->prepTime,
				'servingSize' => $recipeData->servingSize,
				'imagePath' => $recipeData->imagePath,
				'ingredients' => $recipeData->ingredients,
				'directions' => $recipeData->directions,
				'comments' => $comments,
				'link' => $recipeData->link
			];

			$this->view('recipes/display', $data);
		}

		public function videos(){

			if (!file_exists(dirname(APPROOT). '/public/vendor/autoload.php')) {
			  throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
			}

			require_once dirname(APPROOT).'/public/vendor/autoload.php';

			$uri = $_SERVER['REQUEST_URI'];
			$category = substr($uri,strpos($uri,'?')+1);

			// This code will execute if the user entered a search query in the form
			// and submitted the form. Otherwise, the page displays the form above.
			if (strpos($category,'more')!==false) {


				$link =  substr($category,strpos($category,'=')+1);
			  /*
			   * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
			   * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
			   * Please ensure that you have enabled the YouTube Data API for your project.
			   */
			  $DEVELOPER_KEY = 'AIzaSyDZSElRiT8kozTQVZhDC1jvH-KZEyR7Kdw';

			  $client = new Google_Client();
			  $client->setDeveloperKey($DEVELOPER_KEY);

			  // Define an object that will be used to make all API requests.
			  $youtube = new Google_Service_YouTube($client);

			  $htmlBody = '';
			  try {

			    // Call the search.list method to retrieve results matching the specified
			    // query term.
			    $searchResponse = $youtube->search->listSearch('id,snippet',array(
			      'q' => $link,
			      'maxResults' => 5,
			    ));

			    $data = [
						'videos' => $searchResponse['items']
					];

					$this->view('recipes/videos',$data);




			  } catch (Google_Service_Exception $e) {
			    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
			      htmlspecialchars($e->getMessage()));
			  } catch (Google_Exception $e) {
			    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
			      htmlspecialchars($e->getMessage()));
			  }
			}
			else{
				$this->view('recipes/videos');
			}



	}

}
