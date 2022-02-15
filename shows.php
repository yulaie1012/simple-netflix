<?php
require_once("includes/header.php");

$previewProvider = new PreviewProvider($con, $userLoggedIn);
echo $previewProvider->createTVShowsPreviewVideo();

$categoryContainer = new CategoryContainer($con, $userLoggedIn);
echo $categoryContainer->showTVShowsCategories();
?>
