 <?php
class RecipesModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Insert a new recipe into database.
     * Performs 3 insert operations on 'recipe', 'ingredients', and
     * 'directions' tables.
     *
     * @param: $data associate array containing all recipe information to upload
     *
     * @return: true if recipe successfully added, false otherwise
     */
    public function createNewRecipe($data) {
        // Get id of new recipe
        $this->db->query('SELECT rid FROM recipes WHERE rid=(SELECT MAX(rid) FROM recipes)');
        $this->db->execute();
        $row = $this->db->single();
        // Increment recipe id
        $newRecipeID = $row->rid + 1;

        // Upload image and return path
        $imgPath = $this->uploadImage($newRecipeID, $data['uid'], $data['img']);

        // Prepare sql query for new recipe entry
        $this->db->query('INSERT INTO recipes (rid,title,ownerid,description,prepTime,servingSize,imagePath,link) VALUES(:rid,:title,:uid,:description,:prepTime,:servingSize,:imagePath,:link);');
        // Bind values for prepared statement
        $this->db->bind(':rid', $newRecipeID);
        $this->db->bind(':uid', $data['uid']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':prepTime', $data['prepTime']);
        $this->db->bind(':servingSize', $data['servingSize']);
        $this->db->bind(':imagePath', $imgPath);
        $this->db->bind(':link', $data['link']);
        // Execute query
        try {
            $this->db->execute();
        } catch (PDOException $e) {
            echo '</br>FAILED recipe: ' . $e->getMessage() . '</br>';
            return false;
        }

        // Insert ingredients
        $ingredQueryArray = $this->getIngredientsQueries($newRecipeID, $data['ingredients']);
        $ingredQueryString = 'INSERT INTO ingredients (rid,ingredientid,value) VALUES ' . implode(", ", $ingredQueryArray) . ';';
        // echo $ingredQueryString;
        $this->db->query($ingredQueryString);
        // Bind all values in ingredients query
        for($i = 0; $i < count($ingredQueryArray); $i++) {
            $this->db->bind(':value' . ($i + 1), $data['ingredients'][$i]);
        }
        // Execute query
        try {
            $this->db->execute();
        } catch (PDOException $e) {
            echo '</br>FAILED ingredients: ' . $e->getMessage() . '</br>';
            return false;
        }

        // Insert directions
        $direcQueryArray = $this->getDirectionsQueries($newRecipeID, $data['directions']);
        $direcQueryString = 'INSERT INTO directions (rid,stepNum,description) VALUES ' . implode(", ", $direcQueryArray) . ';';
        // echo $direcQueryString;
        $this->db->query($direcQueryString);
        // Bind all values in ingredients query
        for($i = 0; $i < count($direcQueryArray); $i++) {
            $this->db->bind(':value' . ($i + 1), $data['directions'][$i]);
        }
        // Execute query
        try {
            $this->db->execute();
        } catch (PDOException $e) {
            echo '</br>FAILED directions: ' . $e->getMessage() . '</br>';
            return false;
        }

        return true;
    }

    /**
     * Moves image from temporary location into public/img/upload/ directory
     * Image upload names given format 'r{rid}_u{uid}_preview'
     * If no image is provided (size is 0) then return placeholder img path: /img/beef.jpg
     *
     * @param: recipe id of new recipe
     * @param: user id of creator
     * @param: $_FILES['imageName']
     *
     * @return: String path to image upload location
     *          empty string on error
     */
    private function uploadImage($rid, $uid, $imgTemp) {
        if($imgTemp['size'] > 0) {
            $orginalNameExplode = explode('.', $imgTemp['name']);
            $extension = end($orginalNameExplode);
            $uploadName = 'r'.$rid.'_u'.$uid.'_preview.'.$extension;
            $uploadPath = '/img/upload/'.$uploadName;
            if(!file_exists($uploadPath)) {
                move_uploaded_file($imgTemp['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/TheRecipesProject/public'.$uploadPath);
                return $uploadPath;
            }
        }
        // Default placeholder image path
        return '/img/beef.jpg';;
    }

    /**
     * Convert ingredients array to sql value template.
     * Each element follows format: '(rid, x, :valuex)'
     * where x increments from 1 to number of ingredients
     *
     * @param: rid
     * @param: non-associative array of ingredients
     *
     * @return: array containing query values template
     */
    private function getIngredientsQueries($rid, $ingredients) {
        $result = [];
        for($i = 1; $i < count($ingredients) + 1; $i++) {
            $result[$i - 1] = '(' . $rid . ', ' . $i . ', :value' . $i . ')';
        }
        return $result;
    }

    /**
     * Convert directions array to sql value template.
     * Each element follows format: '(rid, x, :valuex)'
     * where x increments from 1 to number of directions
     *
     * @param: rid
     * @param: non-associative array of directions
     *
     * @return: array containing query values template
     */
    private function getDirectionsQueries($rid, $directions) {
        $result = [];
        for($i = 1; $i < count($directions) + 1; $i++) {
            $result[$i - 1] = '(' . $rid . ', ' . $i . ', :value' . $i . ')';
        }
        return $result;
    }

    /**
     * Retrieve recipe information from database.
     * Recipe will return object containing:
     * - title
     * - description
     * - preparation time
     * - serving size
     * - image path for preview image
     * - list of ingredients
     * - list of directions
     * 
     * TODO: fetch ownerid's username
     *
     * @param: recipe id to fetch
     * @return: all data of recipe as associative stdClass Object
     */
    public function getRecipeData($rid) {
        // Query to select recipe
        $this->db->query('SELECT * FROM recipes WHERE rid=:rid');
        $this->db->bind(':rid', $rid);
        $this->db->execute();
        $recipeResult = $this->db->single();

        // If recipe does not exist, return null
        if($recipeResult == null) {
            return null;
        }

        // Convert from object into array to append owner username, ingredients ,and directions
        $recipeResult = (array)$recipeResult;

        // Retrieve owner username and append to result
        $this->db->query('SELECT user_username FROM users WHERE user_id=:uid');
        $this->db->bind(':uid', $recipeResult['ownerid']);
        $this->db->execute();
        $result = $this->db->single();
        $recipeResult['owner_username'] = $result->user_username;

        // Query to select recipe's ingredients list
        $this->db->query('SELECT ingredientid, value FROM ingredients WHERE rid=:rid');
        $this->db->bind(':rid', $rid);
        $this->db->execute();
        $ingredientsResult = $this->db->resultSet(true);
        $recipeResult['ingredients'] = $ingredientsResult;

        // Query to select recipe's directions list
        $this->db->query('SELECT stepNum, description FROM directions WHERE rid=:rid');
        $this->db->bind(':rid', $rid);
        $this->db->execute();
        $directionsResult = $this->db->resultSet(true);
        $recipeResult['directions'] = $directionsResult;

        return (object)$recipeResult;
    }

    /**
     * Returns all recipes
     *
     * @return: associative object
     */
    public function getAllRecipes() {
        $this->db->query('SELECT * FROM recipes');
        $this->db->execute();
        return $this->db->resultSet();
    }

    /**
     * Returns recipes containing keywords specified by query string
     * 
     * @param: query string keyword(s)
     * @return: associative object
     */
    public function searchRecipes($query) {
        $query = '%'.$query.'%';
        $this->db->query('SELECT * FROM recipes WHERE ( title LIKE ? OR description LIKE ? )');
        $this->db->bind(1, $query);
        $this->db->bind(2, $query);
        return $this->db->resultSet();
    }

    /**
     * Returns all comments on recipe given by recipe id
     *
     * @return: associative object
     */
    public function getAllComments($rid) {
        $this->db->query('SELECT * FROM comments WHERE recipe_id = :rid ORDER BY date DESC');
        $this->db->bind(':rid', $rid);
        return $this->db->resultSet();
    }

    /**
     * Adds new comment to comments table
     *
     * @param: $data containing rid, comment, rating in an associative array
     *
     * @return: false on PDOException, comment as result
     */
    public function addNewComment($data){
        $this->db->query("INSERT INTO comments (comment_description, rating, recipe_id, ownerid) VALUES (:description, :rating, :recipeid, :ownerid)");
        $this->db->bind(':description', $data['comment']);
        $this->db->bind(':rating', $data['rating']);
        $this->db->bind(':recipeid', $data['rid']);
        $this->db->bind(':ownerid',$_SESSION['user_id']);
        try {
            $this->db->execute();
        } catch (PDOException $e) {
            return false;
        }

        // Return the comment added from the INSERT operation above
        $this->db->query('SELECT * FROM comments WHERE comment_id = (SELECT MAX(comment_id) FROM comments)');
        return $this->db->single();
    }

}
