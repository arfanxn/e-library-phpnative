<?php

use Scriptotek\GoogleBooks\GoogleBooks;

// $books = new GoogleBooks([
//   'key' => 'AIzaSyC1MJIaTQLl6RJaf7KT0PXcBTo4iy5LsMo',
//   'maxResults' => 10
// ]);

// foreach ($books->volumes->search($data['searchKey']) as $vol) {
//   var_dump($vol->title . "\n");
// }

class GBooks
{
  public  $books;
  public function __construct()
  {
    $this->books = new GoogleBooks([
      'key' => 'AIzaSyC1MJIaTQLl6RJaf7KT0PXcBTo4iy5LsMo',
      'maxResults' => 22
    ]);
  }

  public function search($key)
  {
    return $this->books->volumes->search($key);
  }

  public function byIsbn()
  {
    return $this->books->volumes->byIsbn('000031118538');
  }
}
