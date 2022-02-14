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

    echo "<img src='$thumbnail'>";
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
