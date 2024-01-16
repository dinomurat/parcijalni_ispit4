<?php

namespace App\Core;

use App\Database\Dbconnection;
use App\Exception\ConnectionInstanceExcepetion;
use Symfony\Component\Dotenv\Dotenv;

// Object that controls the configuration for database and creates one instace of it

class Application
{
  public function __construct()
  {}

  public function init()
  {
  
    // Using dotenv packet to store stabase sensitive informations
  
    $dotenv = new Dotenv();
    $dotenv->load(ROOT . '/.env');

    // Loading databse sensitive informations into constants
    define('DB_DSN', $_ENV['DB_DSN']);
    define('DB_USERNAME', $_ENV['DB_USERNAME']);
    define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
  }

  public function run()
  {
    // Creating instance of Dbconnection class
    try{
      $connection = Dbconnection::getInstance();
    } catch(ConnectionInstanceException){
      echo "Failed to create instance of Connection!\n";
    }

    // Connecting to the database
    $connection->connect(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Connection Successful!" . PHP_EOL;
  }
}