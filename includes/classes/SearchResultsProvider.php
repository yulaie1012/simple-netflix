<?php
class SearchResultsProvider {
  private $con, $username;

  public function __construct($con, $username) {
    $this->con = $con;
    $this->username = $username;
  }

  public function getResults($keyword) {
    $entities = EntityProvider::getSearchEntities($this->con, $keyword);
  }
}
?>
