<?php
require_once("includes/header.php");

$previewProvider = new PreviewProvider($con, $userLoggedIn);
echo $previewProvider->createTrailer(null);
?>
