<?php
!session_id() ? session_start() : false;
// require_once 'javascriptToPHP.php';
require_once '../app/init.php';

new App;

// unset($_SESSION['user']);
