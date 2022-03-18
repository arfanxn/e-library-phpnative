<div class="row">
  <form action="<?= BASEURL; ?>/user/create" method="POST" class="position-absolute top-50 start-50 translate-middle p-3 p-md-4 shadow rounded col-10 col-md-4">
    <?= isset($_SESSION['flash']) ? Flasher::flash() : false ?>
    <div class="mb-3">
      <label for="fullname" class="form-label">Fullname</label>
      <input name="fullname" autocomplete="off" type="text" class="form-control" id="fullname">
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input name="username" autocomplete="off" type="username" class="form-control" id="username" aria-describedby="emailHelp">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input name="password" autocomplete="off" type="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
      <label for="confirmPassword" class="form-label">Confirm Password</label>
      <input name="confirmPassword" autocomplete="off" type="password" class="form-control" id="confirmPassword">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label fw-lighter" for="exampleCheck1">Agree Privacy & Policy</label>
    </div>
    <button type="submit" class="btn btn-primary ">Sign Up</button>
  </form>
</div>