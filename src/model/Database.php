<?php

class Database {
	private static $host = "localhost";
	private static $dbName = "recipes-system";
	private static $username = "root";
	private static $password = "";

	private static $instance = NULL;// Singleton pattern

	private function __construct() {}

	/**
	* Create new PDO database connection and set default fetch mode to object. 
	* Db connection follows Singleton Pattern.
	*/
	public static function getInstance() {
		if(!isset(self::$instance)) {
			try{
				$dsn = 'mysql:host='.self::$host.';dbname='.self::$dbName.'';
				$db = new PDO($dsn, self::$username, self::$password);
				
				// Allow error handling
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// Sets default fetch mode to object, reference using $row = $stmt->fetch(); $row->title
				$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

				self::$instance = $db;
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
		return self::$instance;
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


