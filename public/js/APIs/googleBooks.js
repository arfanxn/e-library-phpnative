console.log('hello');

$(document).ready(function () {
  // let outputList = document.getElementById()
  let item, title;
  let googleBooksUrl = `https://www.googleapis.com/books/v1/volumes?startIndex=11&key=AIzaSyC1MJIaTQLl6RJaf7KT0PXcBTo4iy5LsMo&q=`;
  let searchInput;

  $('#searchBtn').on('click', function () {
    console.log('hello');
    searchInput = $('#searchInput').val();
    if (searchInput == '' || searchInput == null) {

    } else {
      $.ajax({
        url: googleBooksUrl + searchInput,
        dataType: 'JSON',
        success: function (results) {
          console.log(results['items']);
          if (results.totalItem > 0) alert('no results');
        },
        error: () => 'somethings went wrong!'

      })
    }
    console.log(searchInput);
  })

})