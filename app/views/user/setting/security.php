<!-- for desktop -->
<!-- for desktop -->
<section class="row bg-light rounded px-0">

  <!-- desktop -->
  <div class=" d-none d-md-flex m-0 p-0">
    <div class="col-4 bg-light border-bottom border-dark py-1 mb-4 text-center "><a class="text-decoration-none text-dark fs-4" href="<?= BASEURL ?>/user/profile_settings">Profile</a></div>
    <div class="col-4 bg-light border-bottom border-dark border-start border-end py-1 mb-4 text-center shadow-sm"><a class="text-decoration-none text-dark fs-4 fw-bold" href="<?= BASEURL ?>/user/security_settings">Security</a></div>
    <div class="col-4 bg-light border-bottom border-dark py-1 mb-4 text-center"><a class="text-decoration-none text-dark fs-4 " href="">Account</a></div>
  </div>
  <!-- <div class="col-md-4">
    <div class=" col-6 p-1  ">
      <img class="rounded-circle" src="<?= BASEURL . PROFILE_PICTURE . '/' .  $_SESSION['user']['profilePicture'] ?>" alt="" width="200px" height="200">
    </div>
  </div> -->

  <!-- for mobile -->
  <!-- for mobile -->
  <div class="d-md-none row row-cols-3  pt-2 px-0 m-0">
    <div class="text-center col p-3 bg-light ">
      <a class="text-decoration-none text-dark" href="<?= BASEURL ?>/user/profile_settings">Profile</a>
    </div>
    <div class="text-center col p-3 border-end border-dark border-start bg-light shadow">
      <a class="text-decoration-none text-dark fw-bold" href="<?= BASEURL ?>/security_settings">Security</a>
    </div>
    <div class="text-center col p-3 bg-light">
      <a class="text-decoration-none text-dark" href="">Account</a>
    </div>
    <div class="border col-12 border-dark shadow mb-3"></div>
  </div>

  <form class="col-md-12  mb-3" action="<?= BASEURL; ?>/user/updateSecurity" method="POST">
    <div class=" input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Username</span>
      <input disabled type="text" class="font-monospace fw-lighter bg-light form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" placeholder="<?= $_SESSION['user']['username'] ?>" value="<?= $_SESSION['user']['username'] ?>">
    </div>
    <div class="form-floating mb-3">
      <input name="password" required type="password" class="form-control" id="password">
      <label for="password">Current Password</label>
    </div>
    <div class="form-floating mb-3">
      <input name="newPassword" required type="password" class="form-control" id="newPassword">
      <label for="newPassword">New Password</label>
    </div>
    <div class="form-floating mb-1">
      <input name="confirmNewPassword" required type="password" class="form-control" id="confirmNewPassword">
      <label for="confirmNewPassword">Confirm New Password</label>
    </div>
    <div class="text-start">
      <p class="text-muted">You will auto signed out after this session!</p>
    </div>
    <div class="">
      <?= isset($_SESSION['flash']) ? Flasher::flash() : false; ?>
    </div>
    <div class="text-end mt-3">
      <button type="submit" class="btn btn-dark">Change password</button>
    </div>
  </form>
</section>