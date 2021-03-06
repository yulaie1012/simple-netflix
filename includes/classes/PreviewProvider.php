<?php
class PreviewProvider {
  private $con, $username;

  public function __construct($con, $username) {
    $this->con = $con;
    $this->username = $username;
  }

  public function createTVShowsPreviewVideo() {
    $entityArray = EntityProvider::getTVShowsEntities($this->con, null, 1);

    if (sizeof($entityArray) == 0) {
      ErrorMessage::show("No TV shows to display.");
    }

    return $this->createPreviewVideo($entityArray[0]);
  }

  public function createMoviesPreviewVideo() {
    $entityArray = EntityProvider::getMoviesEntities($this->con, null, 1);

    if (sizeof($entityArray) == 0) {
      ErrorMessage::show("No movies to display.");
    }

    return $this->createPreviewVideo($entityArray[0]);
  }

  public function createCategoryPreviewVideo($categoryId) {
    $entityArray = EntityProvider::getEntities($this->con, $categoryId, 1);

    if (sizeof($entityArray) == 0) {
      ErrorMessage::show("No movies to display.");
    }

    return $this->createPreviewVideo($entityArray[0]);
  }

  public function createPreviewVideo($entity) {
    if ($entity == null) {
      $entity = $this->getRandomEntity();
    }

    $id = $entity->getId();
    $name = $entity->getName();
    $thumbnail = $entity->getThumbnail();
    $trailer = $entity->getTrailer();

    $videoId = VideoProvider::getEntityVideoForUser($this->con, $id, $this->username);
    $video = new Video($this->con, $videoId);

    $seasonEpisode = $video->getSeasonAndEpisode();
    $subtitle = $video->isMovie() ? "" : "<h4>$seasonEpisode</h4>";

    $inProgress = $video->isInProgress($this->username);
    $playButtonText = $inProgress ? "Continue watching" : "Play";

    return "<div class='preview-container'>
              <img src='$thumbnail' class='preview-image' hidden />
              <video autoplay class='preview-video' onended='finishTrailer();'>
                <source src='$trailer' type='video/mp4' />
              </video>
              <div class='preview-overlay'>
                <div class='main-details'>
                  <h3>$name</h3>
                  $subtitle
                  <div class='buttons'>
                    <button onclick='watchVideo($videoId)'>
                      <i class='fa-solid fa-play'></i> $playButtonText
                    </button>
                    <button onclick='toggleVolume(this);'>
                      <i class='fa-solid fa-volume-high'></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>";
  }

  public function createEntityPreviewSquare($entity) {
    $id = $entity->getId();
    $thumbnail = $entity->getThumbnail();
    $name = $entity->getName();

    return "<a href='entity.php?id=$id'>
              <div class='preview-container small'>
                <img src='$thumbnail' title='$name' />
              </div>
            </a>";
  }

  private function getRandomEntity() {
    $entity = EntityProvider::getEntities($this->con, null, 1);
    return $entity[0];
  }
}
?>
