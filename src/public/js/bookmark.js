function bookmark(bookId) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: `/book/bookmark/${bookId}`,
    type: "POST",
    data: {
        _method: "POST"
    },
  })
    .done(function (data) {
      updatecount(bookId, data.bookmarksCount);
      location.reload();
    })
    .fail(function (error) {
      console.log(error);
    });
}


function unbookmark(bookId) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: `/book/unbookmark/${bookId}`,
    type: "POST",
    data: {
        _method: "DELETE"
    },
  })
    .done(function (data) {
      location.reload();
      updatecount(bookId, data.bookmarksCount);
    })
    .fail(function (error) {
      console.log(error);
    });
}

function updatecount(bookId, count) {
  $(".bookmark[data-book-id=" + bookId + "] .badge").text(count);
}
