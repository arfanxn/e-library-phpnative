<?php

class Home extends Controller
{
  public function index()
  {
    $data = [
      'htmlTitle' => ' | Home',
      'htmlFooter' => '<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="js/APIs/googleBooks.js"></script>'
    ];
    $this->view('home/index', $data);
  }

  public function search()
  {
    $gBooks = $this->apis('GBooks')->search($_POST['searchKeyword']);
    $data = [
      'htmlTitle' => ' | Home',
      'results' => $gBooks
    ];
    $this->view('home/index', $data);
  }
}
