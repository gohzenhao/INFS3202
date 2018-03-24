<?php

class Database {
	private $host = "localhost";
	private $dbName = "recipes-system";
	private $username = "root";
	private $password = "";

	private $instance = NULL;//singleton pattern

	/**
	* Create new PDO database connection and set default fetch mode to object. 
	* Db connection follows Singleton Pattern.
	*/
	public function __construct() {
		if($this->instance == NULL) {
			try{
				$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName.'';
				$db = new PDO($dsn, $this->username, $this->password);
				
				// Allow error handling
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// Sets default fetch mode to object, reference using $row = $stmt->fetch(); $row->title
				$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

				$this->instance = $db;
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}



	// /**
	// * Sends sql query to db
	// * dangerOUS!!!!!!!!!!!!!!!!!!!
	// */
	// public function query($sql) {
	// 	try {
	// 		$query = $this->instance->prepare($sql);
	// 		$query->execute();

	// 		return $query;
	// 	} catch(PDOException $e) {
	// 		echo "Error: " . $e->getMessage();
	// 	}
	// }



}


