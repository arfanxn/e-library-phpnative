<?php

class Bookmark extends Controller
{
  public function index()
  {
    $bookmarkM =  $this->model('Bookmark');
    $_SESSION['user']['bookmark']['bookSelf'] = $bookmarkM->getBookmarkBooksSelf($_SESSION['user']['id']);
    $results = $bookmarkM->getAllBookmarkBooksByUserId($_SESSION['user']['id']);
    $this->view('books/bookmark', [
      'htmlTitle' => 'Bookmark',
      'htmlHead' => '<link rel="stylesheet" href="' . BASEURL . '/css/collection/style.css">',
      'results' => $results,
      'key' => 'saaaa'
    ]);
  }

  public function search($key = '')
  {
    // live search integrations with js fetch
    $key = $key == '' ? $_POST['searchKey'] : $key;
    // $key == '' ? header('LOCATION: ' . BASEURL . '/collection') : true;
    $userId = $_SESSION['user']['id'];
    $bookmarkM =  $this->model('Bookmark');
    $_SESSION['user']['bookmark']['bookSelf'] = $bookmarkM->getBookmarkBooksSelf($userId);
    $results = $bookmarkM->getBookmarkBooksByUserIdAndBy__($userId,  $key);

    echo json_encode($results);
    die;

    $this->view('books/bookmark', [
      'htmlTitle' => 'Bookmark',
      'htmlHead' => '<link rel="stylesheet" href="' . BASEURL . '/css/collection/style.css">',
      'results' => $results,
      'searchKey' => ucwords($key),
    ]);
  }

  public function add()
  {
    $userId = isset($_POST['userId']) ? $_POST['userId'] : $_SESSION['user']['id'];
    $bookmarkM = $this->model('Bookmark');
    $bookmarkM->addToTableBookmarkBooksbyUserId($userId, $_POST);
  }

  public function delete()
  {
    $bookSelf = $_POST['bookSelf'];
    $userId = isset($_POST['userId']) ? $_POST['userId'] : $_SESSION['user']['id'];
    $this->model('Bookmark')->deleteFromTableBookmarkBooksbyUserId($userId, $bookSelf);
  }
}
