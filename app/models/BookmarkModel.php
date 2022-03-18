<?php

class BookmarkModel extends Model
{
  private $db, $table;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function addToTableBookmarkBooksbyUserId($userId, $data)
  {
    $query = "INSERT INTO bookmark_books VALUES 
              ('' , :user_id, :title, :isbn, :authors, :img_url, :self, :description, :publisher, :published_date)";
    $this->db->query($query);

    if (!isset($data['bookDesc'])  || !$data['bookDesc']) {
      $data['bookDesc'] = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab aut vel quidem dolore, adipisci eos nemo praesentium ducimus consequuntur quis odio dignissimos voluptatum, fugit commodi quibusdam? Aperiam cumque nostrum repudiandae dolore soluta reprehenderit quae neque temporibus libero, alias consequuntur rem, illo sint vel numquam tenetur similique harum laudantium veritatis, ratione officia possimus quibusdam molestiae? Accusantium laudantium vel consequatur. Hic illo tenetur voluptatibus dignissimos, consectetur, pariatur quis nisi totam iure dolor ipsa, vitae praesentium sapiente consequuntur ab voluptatem voluptas corporis expedita neque similique ullam. Vitae amet voluptates qui molestias culpa corporis id aliquam dolorem sed nihil placeat, asperiores maiores modi. Consectetur placeat, architecto natus accusamus quam molestias qui sequi ipsam mollitia asperiores, itaque nemo cumque quos totam modi quasi quis? Neque, itaque error facilis nam consequuntur dicta repellendus aperiam unde dolores vel eaque odit? Dolorum placeat porro omnis ad aut cupiditate atque molestiae facilis quis quaerat, quod quas repudiandae assumenda ipsum reprehenderit expedita accusamus itaque natus? Eligendi, reiciendis fuga. Quae quas non ullam, doloribus repudiandae modi! Labore itaque, sunt dolorum ex ea aliquam quibusdam a soluta. Asperiores facere quod ipsum architecto, sint quaerat voluptas? Hic id dolores ex minus fugiat, beatae deserunt aliquid, adipisci aliquam ducimus corrupti recusandae sint autem est?';
    }

    $this->db->bind('user_id', $userId);
    $this->db->bind('title', $data['bookTitle']);
    $this->db->bind('authors', $data['bookAuthors']);
    $this->db->bind('img_url', $data['bookImg']);
    $this->db->bind('description', $data['bookDesc']);
    $this->db->bind('isbn', $data['bookIsbn']);
    $this->db->bind('self', $data['bookSelf']);
    $this->db->bind('publisher', $data['bookPublisher']);
    $this->db->bind('published_date', $data['bookPublishedDate']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function deleteFromTableBookmarkBooksbyUserId($userId, $bookSelf)
  {
    $query = "DELETE FROM bookmark_books WHERE  
              `user_id` = '$userId' AND `self` = '$bookSelf' ";
    $this->db->query($query);
    $this->db->execute();
  }

  public function getBookmarkBooksByUserIdAndBy__($userId, $key)
  {
    $query = "SELECT * FROM bookmark_books WHERE user_id = '$userId' AND title LIKE '%$key%' ";
    $this->db->query($query);
    $results =  $this->db->results();
    return $results;
  }

  public function getAllBookmarkBooksByUserId($userId)
  {
    $this->db->query("SELECT * FROM bookmark_books WHERE user_id = " . "'$userId'");
    return $this->db->results();
  }

  public function getBookmarkBooksSelf($userId)
  {
    $this->db->query("SELECT self FROM bookmark_books WHERE user_id = " . "'$userId'");
    $results = $this->db->results();
    $bookSelf = [];
    foreach ($results as $res) {
      array_push($bookSelf, $res['self']);
    }
    return $bookSelf;
  }
}
