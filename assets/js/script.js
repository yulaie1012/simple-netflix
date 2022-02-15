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
  setStartTime(videoId, username);
  updateProgressTimer(videoId, username);
}

function updateProgressTimer(videoId, username) {
  addProgress(videoId, username);

  let timer;

  $("video")
    .on("playing", function (event) {
      window.clearInterval(timer);
      timer = window.setInterval(function () {
        updateProgress(videoId, username, event.target.currentTime);
      }, 3000);
    })
    .on("ended", function () {
      setFinished(videoId, username);
      window.clearInterval(timer);
    });
}

function addProgress(videoId, username) {
  $.post("ajax/addProgress.php", { videoId, username }, function (data) {
    if (data !== null && data !== "") {
      alert(data);
    }
  });
}

function updateProgress(videoId, username, progress) {
  $.post("ajax/updateProgress.php", { videoId, username, progress }, function (data) {
    if (data !== null && data !== "") {
      alert(data);
    }
  });
}

function setFinished(videoId, username) {
  $.post("ajax/setFinished.php", { videoId, username }, function (data) {
    if (data !== null && data !== "") {
      alert(data);
    }
  });
}

function setStartTime(videoId, username) {
  $.post("ajax/getProgress.php", { videoId, username }, function (data) {
    if (isNaN(data)) {
      alert(data);
      return;
    }

    $("video").on("canplay", function () {
      this.currentTime = data;
      $("video").off("canplay");
    })
  })
}
