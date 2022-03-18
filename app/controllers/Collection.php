<?php

class Collection extends Controller
{
  public function index()
  {
    $key = $this->model('Collection')->randomCollection();
    $gBooksApi =  $this->apis('GBooks')->search($key);
    $_SESSION['user']['bookmark']['bookSelf'] = $this->model('Bookmark')->getBookmarkBooksSelf($_SESSION['user']['id']);
    $this->view('books/collection', [
      'htmlTitle' => 'Collection',
      'htmlHead' => '<link rel="stylesheet" href="' . BASEURL . '/css/collection/style.css">',
      'key' => ucwords($key),
      'results' => $gBooksApi
    ]);
  }

  public function search($key = '')
  {
    $key = $key == '' ? $_POST['searchKey'] : $key;
    $key == '' ? header('LOCATION: ' . BASEURL . '/collection') : true;
    $gBooksApi =  $this->apis('GBooks')->search($key);
    $_SESSION['user']['bookmark']['bookSelf'] = $this->model('Bookmark')->getBookmarkBooksSelf($_SESSION['user']['id']);
    $this->view('books/collection', [
      'htmlTitle' => ' | ' . ucwords($key),
      'htmlHead' => '<link rel="stylesheet" href="' . BASEURL . '/css/collection/style.css">',
      'key' => ucwords($key),
      'searchKey' => ucwords($key),
      'results' => $gBooksApi
    ]);
  }

  public function pagination()
  {
    $gBooksApi  = $this->apis('GBooks');
  }

  public function byIsbn()
  {
    $gBooksApi = $this->apis('GBooks')->byIsbn();
    // var_dump($gBooksApi->accessInfo->webReaderLink);
    var_dump($gBooksApi);
  }
}
