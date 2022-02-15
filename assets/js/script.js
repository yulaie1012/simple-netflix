function toggleVolume(button) {
  const muted = $(".preview-video").prop("muted");
  $(".preview-video").prop("muted", !muted);

  $(button).find("i").toggleClass("fa-volume-xmark");
  $(button).find("i").toggleClass("fa-volume-high");
}

function finishTrailer() {
  $(".preview-video").toggle();
  $(".preview-image").toggle();
}

function hideTimer() {
  let timeout = null;

  $(document).on("mousemove", function () {
    clearTimeout(timeout);
    $(".watch-nav").fadeIn();

    timeout = setTimeout(function () {
      $(".watch-nav").fadeOut();
    }, 3000);
  });
}

function initializeVideo() {
  hideTimer();
}
