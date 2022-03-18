  <?php
  if (!isset($_SESSION['user'])) {
    Flasher::setFlash('You need to sign in to access other content', 'info');
    header('LOCATION: ' . BASEURL . '/user');
  }
  ?>
