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

  private function getRandomEntity() {
    $query = $this->con->prepare("SELECT * FROM entities
                                  ORDER BY RAND()
                                  LIMIT 1");
    $query->execute();

    $row = $query->fetch(PDO::FETCH_ASSOC);
    return new Entity($this->con, $row);
  }
}
?>
