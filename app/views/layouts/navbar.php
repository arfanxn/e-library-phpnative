<!-- <style>
  .noneWhenScroll,
  .showWhenScroll,
  .searchNavbar {
    display: none;
  }
</style> -->

<!-- a div for showing temporary blank screen for hiding some contents  -->
<div class="tempBlank w-100 h-100 bg-dark position-relative" style="z-index : 9999999999999999999999999999999999999 ;">
  <div class="fixed-top w-100 h-25 bg-dark"></div>
</div>


<header class="p-3 bg-dark text-white fixed-top d-none d-md-flex">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center ">
      <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none fs-4 me-2">
        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
        </svg>E-Library
      </a>

      <ul class="noneWhenScroll nav col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href='<?= BASEURL ?>/home' class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="<?= BASEURL ?>/category" class="nav-link px-2 text-white">Category</a></li>
        <li><a href="<?= BASEURL ?>/collection" class="nav-link px-2 text-white">Collection</a></li>
        <li><a href="<?= BASEURL ?>/bookmark" class="nav-link px-2 text-white">Bookmark</a></li>
        <!-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li> -->
        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
      </ul>

      <ul class="showWhenScroll nav col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href='<?= BASEURL ?>/home' class="nav-link px-2 text-secondary">Home</a></li>
        <li><a onclick="window.scrollTo(0, 0);" class="nav-link px-2 text-white " style="cursor: pointer;">Back to top</a></li>
      </ul>

      <form action="<?= BASEURL; ?>/collection/search" class="input-group showWhenScroll mx-5 w-50" method="POST">
        <input required name="searchKey" required type="text" class="form-control" placeholder="Search e-book, etc." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-secondary" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg></button>
      </form>

      <div class="text-end">
        <?php if (isset($_SESSION['user'])) : ?>
          <div class="d-none d-sm-flex">
            <ul class="text-end list-unstyled navbar-nav" style="--bs-scroll-height: 100px;">
              <li class="nav-item dropdown ">
                <a class="noneWhenScroll nav-link dropdown-toggle text-light fw-light fs-5 p-0" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['user']['fullname']; ?>
                  <img class="rounded-circle" width="30" height="30" src="<?= BASEURL . PROFILE_PICTURE . '/' .  $_SESSION['user']['profilePicture'] ?>" alt="">
                </a>
                <a class="showWhenScroll nav-link dropdown-toggle text-light fw-light fs-5 p-0" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="rounded-circle" width="30" height="30" src="<?= BASEURL . PROFILE_PICTURE . '/' .  $_SESSION['user']['profilePicture'] ?>" alt="">
                </a>
                <ul class=" dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/user/profile_settings">Profile</a></li>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/user/security_settings">Setting</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/user/signOut">Sign Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        <?php endif; ?>
        <?php if (!isset($_SESSION['user'])) : ?>
          <a href="<?= BASEURL; ?>/user" class="btn btn-outline-light me-2">Sign in</a>
          <a href="<?= BASEURL; ?>/user/signup" class="btn btn-warning">Sign up</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>

<header class="d-md-none">
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav> -->
  <nav class="bg-dark fixed-top py-3 row">
    <div class="col-6 ps-4 "><a class="text-decoration-none fw-bold fs-4 text-white" data-bs-toggle="offcanvas" role="button" href="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">☰ E-Library</a></div>
    <!-- <div class="col-2 ps-4 showWhenScroll"><a class="text-decoration-none fw-bold fs-4 text-white" data-bs-toggle="offcanvas" role="button" href="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">☰</a></div> -->
    <div class="offset-3 col-3 pe-4">
      <ul class="text-end list-unstyled navbar-nav" style="--bs-scroll-height: 100px;">
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle text-light fw-light fs-5 p-0" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="rounded-circle" width="30" height="30" src="<?= BASEURL . PROFILE_PICTURE . '/' .  $_SESSION['user']['profilePicture'] ?>" alt="">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
            <li><a class="ps-2 dropdown-item" href="<?= BASEURL; ?>/user/profile_settings">Profile</a></li>
            <li><a class="ps-2 dropdown-item" href="<?= BASEURL; ?>/user/security_settings">Setting</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="ps-2 dropdown-item" href="<?= BASEURL; ?>/user/signOut">Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <form action="" class="showWhenScroll col-12 px-4 pt-2 pb-0">
      <div class="input-group ">
        <input required type="text" class="form-control" placeholder="Search e-book, etc." aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg></button>
      </div>
    </form>
  </nav>








  <div class="offcanvas offcanvas-start w-75" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header pb-1 border-bottom shadow-sm border-dark bg-dark">
      <div class="offcanvas-title" id="offcanvasWithBothOptionsLabel"><a href="#" class="fw-bold d-flex fs-5 align-items-center mb-2 mb-lg-0 text-white text-decoration-none fs-4 me-2">
          <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
          </svg>E-Library
        </a></div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="mb-1">
        <a class="text-decoration-none text-dark fs-4" href="<?= BASEURL ?>/">Home</a>
      </div>
      <div class="mb-1">
        <a class="text-decoration-none text-dark fs-4" href="<?= BASEURL ?>/">Category</a>
      </div>
    </div>
  </div>
</header>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  let noneWhenScroll = $('.noneWhenScroll');
  let searchNavbar = $('.searchNavbar');
  let showWhenScroll = $('.showWhenScroll');
  let tempBlank = $('.tempBlank');
  document.addEventListener("DOMContentLoaded", function() {
    tempBlank.fadeOut();
  });
  // window.addEventListener("load", function() {
  //   tempBlank.fadeOut();
  // });
  $(document).ready(function() {
    noneWhenScroll.addClass('d-none');
    showWhenScroll.addClass('d-none');
    searchNavbar.addClass('d-none');
    $(this).scrollTop() > 500 ? showWhenScroll.removeClass('d-none') : noneWhenScroll.removeClass('d-none');
  });
  $(document).scroll(function() {
    let y = $(this).scrollTop();
    if (y > 500) {
      noneWhenScroll.addClass('d-none');
      showWhenScroll.removeClass('d-none');
      searchNavbar.removeClass('d-none');
      searchNavbar.fadeIn();
    } else {
      noneWhenScroll.removeClass('d-none');
      showWhenScroll.addClass('d-none');
      searchNavbar.addClass('d-none');
      // $('.searchNavbar').fadeOut();
    }
  });
</script>