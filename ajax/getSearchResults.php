<?php
require_once("../includes/config.php");

if (isset($_POST["keyword"]) && isset($_POST["username"])) {
  echo "Hello" . $_POST["keyword"];
} else {
  echo "No keyword or username passed into file.";
}
?>
