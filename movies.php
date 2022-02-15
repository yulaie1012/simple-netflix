<?php
require_once("includes/header.php");

$previewProvider = new PreviewProvider($con, $userLoggedIn);
echo $previewProvider->createMoviesPreviewVideo();

$categoryContainer = new CategoryContainer($con, $userLoggedIn);
echo $categoryContainer->showMoviesCategories();
?>
