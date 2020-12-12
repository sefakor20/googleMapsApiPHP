<?php

class Connection  
{
  private $host     = "localhost";    
  private $user     = "root";
  private $pass     = "";
  private $dbname   = "test_db";

  public function make() {
    try {
      $connection = new PDO('mysql:host='.$this->host. ';dbname='.$this->dbname, $this->user, $this->pass);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $connection;

      }catch(PDOException $e)
      {
        echo 'Database Error: '. $e->getMessage();                         
      }
  }

}
