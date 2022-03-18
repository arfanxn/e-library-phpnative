<!-- for desktop -->
<!-- for desktop -->
<section class="row bg-light rounded px-0 overflow-hidden h-100">
  <!-- desktop -->
  <div class="d-none d-md-flex m-0 p-0">
    <div class="col-4 bg-light border-bottom border-dark py-1 mb-0 text-center shadow-sm"><a class="fw-bold text-decoration-none text-dark fs-4" href="<?= BASEURL ?>/user/setting/profile">Profile</a></div>
    <div class="col-4 bg-light border-bottom border-dark border-start border-end py-1 mb-0 text-center "><a class="text-decoration-none text-dark fs-4 " href="<?= BASEURL ?>/user/setting/security">Security</a></div>
    <div class="col-4 bg-light border-bottom border-dark py-1 mb-0 text-center"><a class="text-decoration-none text-dark fs-4 " href="">Account</a></div>
  </div>
  <div class="col-md-4 col-12 overflow-hidden p-0 position-relative" style="background-image: url('<?= BASEURL . PROFILE_PICTURE . '/' .  $_SESSION['user']['profilePicture'] ?>'); background-position : center ;
  background-size : cover ;">
  </div>

  <!-- mobile -->
  <div class="d-md-none row row-cols-3  pt-2 px-0 m-0">
    <div class="text-center col p-3 bg-light shadow ">
      <a class="text-decoration-none text-dark fw-bold" href="<?= BASEURL ?>/user/setting/profile">Profile</a>
    </div>
    <div class="text-center col p-3 border-end border-dark border-start bg-light ">
      <a class="text-decoration-none text-dark " href="<?= BASEURL ?>/user/setting/security">Security</a>
    </div>
    <div class="text-center col p-3 bg-light">
      <a class="text-decoration-none text-dark" href="">Account</a>
    </div>
    <div class="border col-12 border-dark shadow mb-3"></div>
  </div>
  <!-- mobile -->

  <form class="col-md-8 col-12 mb-3 mt-4" action="<?= BASEURL; ?>/user/updateProfile" method="POST" enctype="multipart/form-data">
    <div class=" input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Username</span>
      <input disabled type="text" class="font-monospace fw-lighter bg-light form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" placeholder="<?= $_SESSION['user']['username'] ?>" value="<?= $_SESSION['user']['username'] ?>">
    </div>
    <div class="form-floating mb-3">
      <input name="fullname" required type="text" class="form-control" id="fullname" value="<?= $_SESSION['user']['fullname'] ?>">
      <label for="fullname">Fullname</label>
    </div>
    <div class="form-floating mb-3">
      <textarea name="bio" class="form-control" placeholder="Leave a comment here" id="bio"></textarea>
      <label for="bio">Biography</label>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Profile Picture</label>
      <input name="profilePicture" class="form-control" type="file" id="formFile">
    </div>
    <div class="form-floating mb-1">
      <input name="password" required type="password" class="form-control" id="Password">
      <label for="Password">Confirm Password</label>
    </div>
    <div class="text-start">
      <p class="text-muted">Please confirm password for save changes</p>
    </div>
    <?= isset($_SESSION['flash']) ? Flasher::flash() : false; ?>
    <div class="text-end mt-3">
      <button type="submit" class="btn btn-dark">Save changes</button>
    </div>
  </form>
</section>



<!-- for mobile -->
<!-- for mobile
<section class="row d-md-none">
  <form class="col-md-8" action="" method="POST">
    <div class="d-md-none row row-cols-3 mt-2 ">
      <div class="text-center col p-3 bg-light shadow">
        <a class="fw-bold text-decoration-none text-dark" href="<?= BASEURL ?>/user/setting/profile">Profile</a>
      </div>
      <div class="text-center col p-3 border-end border-dark border-start bg-light">
        <a class="text-decoration-none text-dark" href="<?= BASEURL ?>/user/setting/security">Security</a>
      </div>
      <div class="text-center col p-3 bg-light">
        <a class="text-decoration-none text-dark" href="">Account</a>
      </div>
      <div class="border col-12 border-dark shadow mb-3"></div>
    </div>

    <div class=" input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Username</span>
      <input disabled type="text" class="font-monospace fw-lighter bg-light form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" placeholder="<?= $_SESSION['user']['username'] ?>" value="<?= $_SESSION['user']['username'] ?>">
    </div>
    <div class="form-floating mb-3">
      <input required type="text" class="form-control" id="fullname" value="<?= $_SESSION['user']['fullname'] ?>">
      <label for="fullname">Fullname</label>
    </div>
    <div class="form-floating mb-3">
      <input required type="password" class="form-control" id="Password" value="<?= $_SESSION['user']['password'] ?>">
      <label for="Password">Confirm Password</label>
    </div>
    <div class="form-floating mb-3">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
      <label for="floatingTextarea">Bio</label>
    </div>
    <div class="input-group mb-3">
      <input required type="file" class="form-control" id="inputGroupFile02">
      <label class="input-group-text" for="inputGroupFile02">Upload</label>
    </div>
    <div class="text-end mt-4">
      <button type="submit" class="btn btn-dark">Save changes</button>
    </div>
  </form>
</section> -->