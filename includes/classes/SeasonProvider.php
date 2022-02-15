<?php
class SeasonProvider {
  private $con, $username;

  public function __construct($con, $username) {
    $this->con = $con;
    $this->username = $username;
  }

  public function create($entity) {
    $seasons = $entity->getSeasons();

    if (sizeof($seasons) == 0) {
      return;
    }

    $seasonsHtml = "";

    foreach ($seasons as $season) {
      $seasonNumber = $season->getSeasonNumber();

      $videosHtml = "";

      foreach ($season->getVideos() as $video) {
        $videosHtml .= $this->createVideoSquare($video);
      }

      $seasonsHtml .= "<div class='season'>
                         <h3>Season $seasonNumber</h3>
                         <div class='videos'>
                           $videosHtml
                         </div>
                       </div>";
    }

    return $seasonsHtml;
  }

  private function createVideoSquare($video) {
    $id = $video->getId();
    $thumbnail = $video->getThumbnail();
    $name = $video->getTitle();
    $description = $video->getDescription();
    $episode = $video->getEpisode();
    $hasSeen = $video->hasSeen($this->username) ? "<i class='fa-solid fa-circle-check'></i>" : "";

    return "<a href='watch.php?id=$id'>
              <div class='episode-container'>
                <div class='contents'>
                  <img src='$thumbnail'>
                  <div class='video-info'>
                      <h4>$episode. $name</h4>
                      <span>$description</span>
                  </div>
                  $hasSeen
                </div>
              </div>
            </a>";
  }
}
?>
