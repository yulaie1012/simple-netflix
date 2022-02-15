<?php
require_once("includes/header.php");

if (!isset($_GET["id"])) {
  ErrorMessage::show("No ID passed into page");
}

$video = new Video($con, $_GET["id"]);;
$video->increaseViews();
?>
<div class="watch-container">
  <div class="video-controls watch-nav">
    <button>
      <i class="fa-solid fa-arrow-left"></i>
    </button>
    <h1><?php echo $video->getTitle(); ?></h1>
  </div>
  <video controls autoplay>
    <source src="<?php echo $video->getFilePath(); ?>" type="video/mp4" />
  </video>
</div>

<script>
  initializeVideo();
</script>
