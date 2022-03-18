<?php

class CategoryModel extends Model
{
  private $table = 'books_category', $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll()
  {
    $this->db->query("SELECT * FROM $this->table ORDER BY name ASC");
    return $this->db->results();
  }
}
