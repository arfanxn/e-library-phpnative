<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;

    }
  }

  .hero {
    background-image: url('<?= BASEURL ?>/img/home/homeWallpaper.jpg');
    object-fit: cover;
    background-position: 40%;
    background-size: cover;
  }
</style>

<main class="">
  <div class="mb-4 bg-light rounded-3 hero">
    <div class="p-3 p-sm-5 " style=" background-color : rgba(255,255,255, .3) ;">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold ">Today's research, tomorrow's innovation</h1>
        <p class="col-md-8 fs-3">Accelerating research discovery to shape a better future</p>
        <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
        <form class="input-group mb-3" action="<?= BASEURL ?>/collection/search" method="POST">
          <input required name="searchKey" type="text" class="form-control form-control-lg" placeholder="Search e-book, etc.">
          <button name="searchBtn" class="btn btn-dark" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></button>
        </form>
      </div>
    </div>
  </div>

  <div class="row align-items-md-stretch">
    <div class="col-md-6 mb-4 mb-md-0">
      <div class="h-100 p-5 text-white bg-dark rounded-3">
        <h2>Change the background</h2>
        <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
        <button class="btn btn-outline-light" type="button">Example button</button>
      </div>
    </div>
    <div class="col-md-6">
      <div class="h-100 p-5 bg-light border rounded-3">
        <h2>Add borders</h2>
        <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
        <button class="btn btn-outline-secondary" type="button">Example button</button>
      </div>
    </div>
  </div>
</main>