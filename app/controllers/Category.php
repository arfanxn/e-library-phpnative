<?php




class Category extends Controller
{
  public function index()
  {
    $model = $this->model('Category')->getAll();
    $this->view('books/category', [
      'htmlTitle' => WEB_TITLE . " | Category",
      'categoryList' => $model
    ]);
  }

  public function name($arg)
  {
    $arg = preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $arg);
    $gBooksApi = $this->apis('GBooks')->search($arg);
    // $_SESSION['user']['bookmark'] = $this->model('Collection')->getBookmarkListByUserId($_SESSION['user']['id']);
    $this->view("books/collection", [
      'htmlTitle' => WEB_TITLE . ' | ' . ucwords($arg),
      'results' => $gBooksApi,
      'category' => $arg,
      'key' => ucwords($arg)
    ]);
  }
}
