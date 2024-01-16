<?php

namespace App\Database;

// Class that encapuslates connection to the database using singleton pattern
class Dbconnection
{
  private static ?Dbconnection $instance = null; 

  private function __construct()
  {}

  public static function getInstance() :Dbconnection
  {
    if(self::$instance ===null){
      self::$instance = new Dbconnection();
    }

    return self::$instance;
  }

  public function connect(string $db_dsn, string $username, string $password) :\PDO
  {
    // Using PDO excepetion to check if the connection was sucessful
    try{
      return new \PDO($db_dsn, $username, $password);
    }catch (\PDOException) {
      die('Connection Failed!'. PHP_EOL);
    }
  }
}