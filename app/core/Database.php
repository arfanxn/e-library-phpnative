<?php

use function PHPSTORM_META\type;

class Database
{
  private $dbHost = DB_HOST, $dbUser = DB_USER, $dbPass = DB_PASS, $dbName = DB_NAME;
  private $dbh, $stmt;

  public function __construct()
  {
    $dsn = "mysql:host=$this->dbHost;dbname=$this->dbName";
    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
      $this->dbh = new PDO($dsn,  "$this->dbUser", "$this->dbPass", $option);
    } catch (PDOException $e) {
      die("Somethings Wrong : $e->getMessage");
    }
  }

  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
    return $this;
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    $this->stmt->execute();
  }

  public function results()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function result()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
