<?php
require_once("../includes/config.php");
require_once("../includes/classes/SearchResultsProvider.php");
require_once("../includes/classes/Entity.php");
require_once("../includes/classes/EntityProvider.php");
require_once("../includes/classes/PreviewProvider.php");

if (isset($_POST["keyword"]) && isset($_POST["username"])) {
  $searchResultsProvider = new SearchResultsProvider($con, $_POST["username"]);
  echo $searchResultsProvider->getResults($_POST["keyword"]);
} else {
  echo "No keyword or username passed into file.";
}
?>
