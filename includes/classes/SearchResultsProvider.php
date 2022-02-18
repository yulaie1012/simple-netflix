<?php
class SearchResultsProvider {
  private $con, $username;

  public function __construct($con, $username) {
    $this->con = $con;
    $this->username = $username;
  }

  public function getResults($keyword) {
    $entities = EntityProvider::getSearchEntities($this->con, $keyword);

    $html = "<div class='preview-categories no-scroll'>";
    $html .= $this->getResultsHtml($entities);
    $html .= "</div>";

    return $html;
  }

  private function getResultsHtml($entities) {
    if (sizeof($entities) == 0) {
      return;
    }

    $entitiesHtml = "";
    $previewProvider = new PreviewProvider($this->con, $this->username);
    foreach ($entities as $entity) {
      $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
    }

    return "
              <div class='entities'>
                $entitiesHtml
              </div>
            ";
  }
}
?>
