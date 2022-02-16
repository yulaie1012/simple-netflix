<?php
require_once("includes/header.php");

if (!isset($_GET["id"])) {
  ErrorMessage::show("No id passed to page.");
}

$previewProvider = new PreviewProvider($con, $userLoggedIn);
echo $previewProvider->createCategoryPreviewVideo($_GET["id"]);

$categoryContainer = new CategoryContainer($con, $userLoggedIn);
echo $categoryContainer->showCategory($_GET["id"]);
?>
