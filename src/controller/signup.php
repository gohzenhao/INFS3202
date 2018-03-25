<?php


/**
 * 
 */
class Signup extends Controller{

    public function index() {
		echo '<button type="button" class="btn btn-outline-primary">inside signup</button>';
        if(isset($_POST['submit'])) {

			include_once '../src/model/Database.php';
		
			$db = Database::getInstance();
		
			//$sql = "SELECT * FROM ";
			echo "Connected to DB yo!";
			
		
		
		
		
			//header("Location: ../index.php?submit=success");
		
		} else {
		
			exit();
		}
        
    }


}

