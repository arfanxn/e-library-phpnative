<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <?= isset($data['htmlHead']) ? $data['htmlHead'] : false; ?>
  <title><?= isset($data['htmlTitle']) ? $data['htmlTitle'] : 'DEFAULT TITLE'; ?></title>
</head>

<body id="bodyTop" class="container" style="min-height: 2000px;">
  <div class=" d-none d-md-flex p-0 m-5 "></div>
  <div class=" d-md-none pt-4 mt-5 ">
  </div>