<div class="row ">
  <div class="col-md-4 d-none d-md-flex">
    <h4 class="fs-4 text-dark text-break">
      <?= isset($data['searchKey']) ? 'Results' : (isset($data['category']) ? 'Category' : 'Collection') ?> : <?= $data['key'] ?></h4>
  </div>

  <form class="col-md-8 col-12 mb-0 mb-md-1" action="<?= BASEURL ?>/collection/search" method="POST">
    <div class="input-group mb-3">
      <a class="btn btn-light " href="<?= BASEURL ?>/collection"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M13.5 2c-5.288 0-9.649 3.914-10.377 9h-3.123l4 5.917 4-5.917h-2.847c.711-3.972 4.174-7 8.347-7 4.687 0 8.5 3.813 8.5 8.5s-3.813 8.5-8.5 8.5c-3.015 0-5.662-1.583-7.171-3.957l-1.2 1.775c1.916 2.536 4.948 4.182 8.371 4.182 5.797 0 10.5-4.702 10.5-10.5s-4.703-10.5-10.5-10.5z" />
        </svg></a>
      <input required value="<?= isset($data['searchKey']) ? $data['searchKey'] : '' ?>" name="searchKey" type="text" class="form-control" placeholder="Search e-book, etc.">
      <button class="btn btn-dark" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg></button>
    </div>

    <div class="col-12 d-md-none mb-3">
      <h4 class="fs-4 text-dark text-break">
        <?= isset($data['searchKey']) ? 'Results' : (isset($data['category']) ? 'Category' : 'Collection') ?> : <?= $data['key'] ?></h4>
    </div>
  </form>
</div>

<div class="row">
  <?php $i = 1; ?>
  <?php foreach ($data['results'] as $vol) : ?>
    <?php $bookImg = isset($vol->imageLinks->thumbnail) ? $vol->imageLinks->thumbnail  : false; ?>
    <?php if (!$bookImg) continue ?>
    <?php $userBookmark = $_SESSION['user']['bookmark']['bookSelf']; ?>
    <?php $bookSelf = $vol->selfLink ?>
    <?php $bookTitle = $vol->title ?>
    <?php $bookAuthors = is_array($vol->authors) ? implode(', ', $vol->authors)
      : (!$vol->authors ? 'Unknown' : $vol->authors); ?>
    <?php $bookDesc = $vol->description ? $vol->description : ""; ?>
    <?php $isbn = isset($vol->industryIdentifiers[0]) ? $vol->industryIdentifiers[0] : false ?>
    <?php $isbn = isset($isbn->identifier) ? $isbn->identifier : 'None' ?>
    <?php $isBookmarked = in_array($bookSelf, $userBookmark) ? true : false; ?>

    <div class="col-md-4 d-none d-md-flex">
      <div class="card mb-3 border-dark" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4 d-flex">
            <!-- style="background-image: url(''); object-fit : cover ; background-position : center ; background-size : fill;" -->
            <img src="<?= $bookImg ?>" class=" img-fluid rounded-start" style="object-fit: cover; width : 100% ;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= substr($bookTitle, 0,  40) ?></h5>
              <p class="card-text"><?= substr($bookDesc ? $bookDesc  : "", 0, 75) ?></p>
              <div class="flex-column-reverse justify-content-end">
                <button onclick="infoBtn(<?= $i ?>)" data-bs-toggle="modal" data-bs-target="#bookDetail" class="btn btn-sm btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                  </svg></button>
                <?php if ($isBookmarked) :  ?>
                  <button onclick="bookmarkBtn(this, <?= $i ?> , 24)" class="btn btn-sm btn-success bookmarked "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                      <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                    </svg></button>
                <?php else : ?>
                  <button onclick="bookmarkBtn(this, <?= $i ?> , 24)" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                      <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                    </svg></button>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6 gx-3 mb-3 d-md-none">
      <div class="card bg-light border-dark overflow-hidden">
        <img src="<?= $bookImg ?>" class="card-img-top img-card-top" alt="">
        <!-- <div style="background-image : url('<?= $bookImg ?>') ; height : 240px ; background-size : cover ;" class=""></div> -->
        <div class="card-body pt-1 pb-2 px-2">
          <div class="text-start"><button onclick="infoBtn(<?= $i ?>)" data-bs-toggle="modal" data-bs-target="#bookDetail" class="btn btn-sm btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
              </svg></button>
            <?php if ($isBookmarked) :  ?>
              <button onclick="bookmarkBtn(this, <?= $i ?> , 18)" class="btn btn-sm btn-success bookmarked "><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                  <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                </svg></button>
            <?php else : ?>
              <button onclick="bookmarkBtn(this, <?= $i ?> , 18)" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                </svg></button>
            <?php endif; ?>
          </div>
          <h6 class="card-title"><?= substr($bookTitle, 0, 30) ?></h6>
          <small class="card-text"><?= substr($bookDesc ? $bookDesc : "", 0, 40) ?></small>
        </div>
      </div>
    </div>

    <!-- assign vol to hidden input and send to modal box js -->
    <input type="hidden" id="bookSelf<?= $i ?>" value="<?= $bookSelf ?>">
    <input type="hidden" id="bookTitle<?= $i ?>" value="<?= $bookTitle ?>">
    <input type="hidden" id="bookImg<?= $i ?>" value="<?= $bookImg ?>">
    <input type="hidden" id="bookDesc<?= $i ?>" value="<?= $bookDesc ? $bookDesc : "" ?>">
    <input type="hidden" id="bookAuthors<?= $i ?>" value="<?= $bookAuthors ?>">
    <input type="hidden" id="bookPublisher<?= $i ?>" value="<?= $vol->publisher ?>">
    <input type="hidden" id="bookPublishedDate<?= $i ?>" value="<?= $vol->publishedDate ?>">
    <input type="hidden" id="bookIsbn<?= $i ?>" value="<?= $isbn ?>">
    <?php $i++ ?>
  <?php endforeach;  ?>

  <?php if ($i <= 1) : ?>
    <div class="mt-3">
      <?php Flasher::setFlash('Books Not found!', 'danger text-center fs-4'); ?>
      <?= Flasher::flash(); ?>
    </div>
  <?php endif; ?>
</div>













































<!-- Modal -->
<div class="modal fade" id="bookDetail" tabindex="-1" aria-labelledby="bookDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modalTitle" class="bookDetailLabel"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div id="modalImg" class="col-3"></div>
            <div id="modalText" class="col-8 p-0 ">
              <table class="table table-responsive table-sm  overflow-hidden text-break m-0 p-0">
                <tbody>
                  <tr>
                    <th scope="row">Authors</th>
                    <td id="modalAuthors"></td>
                  </tr>
                  <tr>
                    <th scope="row">Publisher</th>
                    <td id="modalPublisher"></td>
                  </tr>
                  <tr>
                    <th scope="row">Isbn</th>
                    <td id="modalIsbn"></td>
                  </tr>
                  <tr>
                    <th scope="row">Release Date</th>
                    <td id="modalPublishedDate"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-12 mt-2">
              <p id="modalDesc" class="text-break"></p>
            </div>
            <form class="text-end col-12" action="" method="POST">
              <button class="btn btn-dark">Read More</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  function infoBtn(index) {
    let bookSelf = document.getElementById(`bookSelf${index}`).value;
    let bookTitle = document.getElementById(`bookTitle${index}`).value;
    let bookImg = document.getElementById(`bookImg${index}`).value;
    let bookAuthors = document.getElementById(`bookAuthors${index}`).value;
    let bookPublisher = document.getElementById(`bookPublisher${index}`).value == false ? 'Unknown' : document.getElementById(`bookPublisher${index}`).value;
    let bookPublishedDate = document.getElementById(`bookPublishedDate${index}`).value == false ? 'Unknown' : document.getElementById(`bookPublishedDate${index}`).value;
    let bookIsbn = document.getElementById(`bookIsbn${index}`).value == false ? 'None' : document.getElementById(`bookIsbn${index}`).value;
    let bookDesc = document.getElementById(`bookDesc${index}`).value;
    $(`#modalTitle`).html(bookTitle);
    $(`#modalImg`).html(`<img src="${bookImg}" class="img-fluid" alt="" srcset="">`);
    $(`#modalAuthors`).html(`${bookAuthors}`);
    $(`#modalIsbn`).html(`${bookIsbn}`);
    $(`#modalPublisher`).html(`${bookPublisher}`);
    $(`#modalPublishedDate`).html(`${bookPublishedDate}`);
    $(`#modalDesc`).html(`${bookDesc}`);
  }


  // ajaxData
  function bookmarkBtn(btn, index, iconSz) {
    let bookSelf = document.getElementById(`bookSelf${index}`).value;
    let bookTitle = document.getElementById(`bookTitle${index}`).value;
    let bookDesc = document.getElementById(`bookDesc${index}`).value;
    let bookImg = document.getElementById(`bookImg${index}`).value;
    let bookAuthors = document.getElementById(`bookAuthors${index}`).value;
    let bookPublisher = document.getElementById(`bookPublisher${index}`).value;
    let bookPublishedDate = document.getElementById(`bookPublishedDate${index}`).value;
    let bookIsbn = document.getElementById(`bookIsbn${index}`).value;
    if ($(btn).hasClass('bookmarked')) { // if the content has bookmarked 
      $.ajax({
        url: "<?= BASEURL ?>/Bookmark/delete",
        method: "POST",
        data: {
          userId: `<?= $_SESSION['user']['id'] ?>`,
          bookSelf: `${bookSelf}`
        },
        success: function(data) {
          console.log(`success deleting bookmark by user_id`);
        },
        error: (err) => {
          console.log(err);
        }
      });
      $(btn).html(`<svg xmlns="http://www.w3.org/2000/svg" width="${iconSz}" height="${iconSz}" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg>`)
      return $(btn).removeClass('bookmarked')

    } else { // if the content not bookmarked 
      $.ajax({
        url: "<?= BASEURL ?>/Bookmark/add",
        method: "POST",
        data: {
          userId: `<?= $_SESSION['user']['id'] ?>`,
          bookSelf: `${bookSelf}`,
          bookTitle: `${bookTitle}`,
          bookDesc: `${bookDesc}`,
          bookImg: `${bookImg}`,
          bookAuthors: `${bookAuthors}`,
          bookPublisher: `${bookPublisher}`,
          bookPublishedDate: `${bookPublishedDate}`,
          bookIsbn: `${bookIsbn}`
        },
        success: function(data) {
          console.log(`success adding to bookmark by user_id`);
        },
        error: (err) => {
          console.log(err);
        }
      });
      $(btn).html(`<svg xmlns="http://www.w3.org/2000/svg" width="${iconSz}" height="${iconSz}" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
  <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
</svg>`)
      return $(btn).addClass('bookmarked')
    }
  }
</script>