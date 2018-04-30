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
     * return: true if recipe successfully added, false otherwise
     */
    public function createNewRecipe($data) {
        // Get id of new recipe
        $this->db->query('SELECT rid FROM recipes WHERE rid=(SELECT MAX(rid) FROM recipes)');
        $this->db->execute();
        $row = $this->db->single();
        // Increment recipe id
        $newRecipeID = $row->rid + 1;
        echo $newRecipeID;

        // Prepare sql query for new recipe entry
        $this->db->query('INSERT INTO recipes (rid,title,ownerid,description,prepTime,servingSize,imagePath) VALUES(:rid,:title,:uid,:description,:prepTime,:servingSize,:imagePath);');
        // Bind values for prepared statement
        $this->db->bind(':rid', $newRecipeID);
        $this->db->bind(':uid', $data['uid']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':prepTime', $data['prepTime']);
        $this->db->bind(':servingSize', $data['servingSize']);
        $this->db->bind(':imagePath', "");
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
        //TODO: imagePath once uploading images feature is added
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
     * Convert ingredients array to sql value template.
     * Each element follows format: '(rid, x, :valuex)'
     * where x increments from 1 to number of ingredients
     * 
     * params: rid and non-associative array of ingredients
     * returns: array containing query values template 
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
     * params: rid and non-associative array of directions
     * returns: array containing query values template 
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
     * param: recipe id to fetch
     * return: associative stdClass Object
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
     * return: associative object
     */
    public function getAllRecipes() {
        $this->db->query('SELECT * FROM recipes');
        $this->db->execute();
        return $this->db->resultSet();
    }

}