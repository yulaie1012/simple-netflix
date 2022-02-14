<?php
class PreviewProvider {
  private $con, $username;

  public function __construct($con, $username) {
    $this->con = $con;
    $this->username = $username;
  }

  public function createTrailer($entity) {
    if ($entity == null) {
      $entity = $this->getRandomEntity();
    }

    $id = $entity->getId();
    $name = $entity->getName();
    $thumbnail = $entity->getThumbnail();
    $trailer = $entity->getTrailer();

    // TODO: ADD SUBTITLE

    return "<div class='preview-container'>
              <img src='$thumbnail' class='preview-image' hidden />
              <video autoplay muted class='preview-video' onended='finishTrailer();'>
                <source src='$trailer' type='video/mp4' />
              </video>
              <div class='preview-overlay'>
                <div class='main-details'>
                  <h3>$name</h3>
                  <div class='buttons'>
                    <button>
                      <i class='fa-solid fa-play'></i> Play
                    </button>
                    <button onclick='toggleVolume(this);'>
                      <i class='fa-solid fa-volume-xmark'></i>
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
