<?php

  class Database{

    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $dbname = 'recipe_project';

    private static $instance = NULL;

    private function __construct() {}

    public static function getInstance(){

      if(!isset(self::$instance)){

        try{

          $db = new PDO('mysql:host='.self::$host. ';dbname='. self::$dbname ,self::$user,self::$password);

          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

          self::$instance = $db;
        }catch(PDOException $e){
          die($e->getMessage());
        }

      }
      return self::$instance;
    }

  }








 ?>
