<?php
require_once("includes/header.php");

$previewProvider = new PreviewProvider($con, $userLoggedIn);
echo $previewProvider->createPreviewVideo(null);

$categoryContainer = new CategoryContainer($con, $userLoggedIn);
echo $categoryContainer->showAllCategories();
?>
