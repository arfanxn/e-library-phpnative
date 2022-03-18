<div class="row ">
  <?php foreach ($data['categoryList'] as $row) : ?>
    <div class="col-6 col-md-3 gy-4 gy-md-3 gx-3 gx-md-3 justify-content-center">
      <a href="<?= BASEURL . '/category/name/'  . $row['url']  ?>">
        <div class="p-0 card bg-dark text-light font-monospace ">
          <img src="<?= $row['imgUrl'] ?>" class="card-img " alt="...">
          <div class="card-img-overlay" style="background-color: rgba(255, 255, 255, 0);">
            <div class="position-absolute top-50 start-50 translate-middle w-100 text-center py-md-3" style="background-color: rgba(0, 0, 0, .5);">
              <h5 class="fs-5 fw-bold"><?= $row['name'] ?></h5>
            </div>
            <p class="card-text"></p>
            <p class="card-text"></p>
          </div>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
</div>