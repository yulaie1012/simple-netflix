<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Taipei");

//Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"], 1);

try {
  // $con = new PDO("mysql:host=$cleardb_server;dbname=$cleardb_db", $cleardb_username, $cleardb_password);
  $con = new PDO("mysql:dbname=netflix;host=localhost", "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
  exit("Connection failed: " . $e->getMessage());
}
?>
