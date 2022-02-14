<?php
class CategoryContainer {
  private $con, $username;

  public function __construct($con, $username) {
    $this->con = $con;
    $this->username = $username;
  }

  public function showAllCategories() {
    $query = $this->con->prepare("SELECT * FROM categories");
    $query->execute();

    $html = "<div class='preview-categories'>";

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $html .= $row["name"];
    }

    return $html . "</div>";
  }
}
?>
