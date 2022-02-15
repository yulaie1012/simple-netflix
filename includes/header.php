<?php
require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/CategoryContainer.php");
require_once("includes/classes/Entity.php");
require_once("includes/classes/EntityProvider.php");
require_once("includes/classes/Season.php");
require_once("includes/classes/SeasonProvider.php");
require_once("includes/classes/Video.php");
require_once("includes/classes/VideoProvider.php");
require_once("includes/classes/ErrorMessage.php");

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="top-bar">
        <div class="logo-container">
          <a href="index.php">
            <img src="assets/images/logo.png" alt="Logo" />
          </a>
        </div>
        <ul class="nav-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="shows.php">TV Shows</a></li>
          <li><a href="movies.php">Movies</a></li>
        </ul>
        <div class="right-items">
          <a href="search.php">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
          <a href="profile.php">
            <i class="fa-solid fa-user"></i>
          </a>
        </div>
      </div>