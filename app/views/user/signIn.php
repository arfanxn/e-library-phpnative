<div class="row">
  <form action="<?= BASEURL ?>/user/signIn_validation" method="POST" class="position-absolute top-50 start-50 translate-middle p-3 p-md-4 shadow rounded col-10 col-md-4">
    <?= isset($_SESSION['flash']) ? Flasher::flash() : false ?>
    <div class="mb-2">
      <label for="username" class="form-label">Username</label>
      <input name="username" autocomplete="off" type="username" class="form-control" id="username" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your data with anyone else.</div>
    </div>
    <div class="mb-4">
      <label for="password" class="form-label">Password</label>
      <input name="password" autocomplete="off" type="password" class="form-control" id="password">
    </div>
    <div class="mb-1 ">
      <button type="submit" class="btn btn-primary">Sign In</button>
      <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
    </div>

  </form>
</div>