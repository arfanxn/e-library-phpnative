<?php

class CollectionModel extends Model
{
  private $db, $table;
  public function __construct()
  {
    $this->db = new Database;
  }


  public function randomCollection()
  {
    $array = [
      'Arts & Music', 'Biographies', 'Business', 'Comics', 'Computers & Tech', 'Cooking', 'Edu & Reference', 'Entertainment', 'Gay & Lesbian', 'Health & Fitness', 'History', 'Hobbies & Crafts', 'Home & Garden', 'Horror', 'Kids',
      'Literature & Fiction', 'Medical', 'Mysteries', 'Parenting', 'Religion', 'Romance', 'Sci-Fi & Fantasy', 'Science & Math', 'Self-Help', 'Social Sciences', 'Sports', 'Teen', 'Travel', 'True Crime', 'Westerns'
    ];
    return $array[rand(0, 30)];
  }
}
