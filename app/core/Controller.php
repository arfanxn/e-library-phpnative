<?php

class Controller
{
  public function model($model)
  {
    $model .= 'Model';
    require_once "../app/models/$model.php";
    return new $model;
  }

  public function view($view = 'home/index', $data = [])
  {
    require_once "../app/views/templates/header.php";
    !isset($data['allowGuest']) ? require_once "../app/views/templates/userOnly.php" : false;
    !isset($data['navbar']) ? require_once "../app/views/layouts/navbar.php" : false;
    require_once "../app/views/$view.php";
    require_once "../app/views/templates/footer.php";
  }

  public function apis($apiName)
  {
    // $model .= 'Model';
    require_once "../app/apis/$apiName.php";
    return new $apiName;
  }
}
