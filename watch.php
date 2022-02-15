<?php
require_once("includes/header.php");

if (!isset($_GET["id"])) {
  ErrorMessage::show("No ID passed into page");
}

$video = new Video($con, $_GET["id"]);;
$video->increaseViews();

$upNextVideo = VideoProvider::getUpNext($con, $video);
?>
<div class="watch-container">
  <div class="video-control watch-nav">
    <button>
      <i class="fa-solid fa-arrow-left"></i>
    </button>
    <h1><?php echo $video->getTitle(); ?></h1>
  </div>
  <div class="video-control up-next">
    <button onclick="restartVideo();">
      <i class="fa-solid fa-arrow-rotate-right"></i>
    </button>
    <div class="up-next-container">
      <h2>Up next:</h2>
      <h3><?php echo $upNextVideo->getTitle(); ?></h3>
      <h3><?php echo $upNextVideo->getSeasonAndEpisode(); ?></h3>
      <button class="play-up-next">
        <i class="fa-solid fa-play"></i>
      </button>
    </div>
  </div>
  <video controls autoplay>
    <source src="<?php echo $video->getFilePath(); ?>" type="video/mp4" />
  </video>
</div>

<script>
  initializeVideo("<?php echo $video->getId(); ?>", "<?php echo $userLoggedIn; ?>");
</script>
