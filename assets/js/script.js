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

function initializeVideo(videoId, username) {
  hideTimer();
  // TODO: set start time
  updateProgressTimer(videoId, username);
}

function updateProgressTimer(videoId, username) {
  addProgress(videoId, username);
}

function addProgress(videoId, username) {
  $.post("ajax/addProgress.php", { videoId, username }, function (data) {
    if (data !== null && data != "") {
      alert(data);
    }
  });
}
