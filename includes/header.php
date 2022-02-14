<?php
require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/Entity.php");

if (!isset($_SESSION["userLoggedIn"])) {
  header("Location: register.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Netflix</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
    <script src="https://kit.fontawesome.com/ab439d9d6d.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="wrapper">
