<?php
class VideoProvider {
  public static function getUpNext($con, $currentVideo) {
    $query = $con->prepare("SELECT * FROM videos
                            WHERE entityId = :entityId AND id != :videoId
                            AND (
                              (season = :season AND episode > :episode) OR season > :season
                            )
                            ORDER BY season, episode ASC
                            LIMIT 1");
    $query->bindValue(":entityId", $currentVideo->getEntityId());
    $query->bindValue(":videoId", $currentVideo->getId());
    $query->bindValue(":season", $currentVideo->getSeason());
    $query->bindValue(":episode", $currentVideo->getEpisode());
    $query->execute();
  }
}
?>
