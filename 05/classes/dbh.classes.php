<?php

class Dbh
{
  protected function connect()
  {
    try {
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $dbname = 'phpooplogin';
      return $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br>";
      die();
    }
  }
}
