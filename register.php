<?php
require_once("includes/classes/FormSanitizer.php");

if (isset($_POST["submitButton"])) {
  $firstName = FormSanitizer::sanitizeFormName($_POST["firstName"]);
  echo $firstName;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Netflix</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
  </head>
  <body>
    <div class="sign-in-container">
      <div class="column">
        <div class="header">
          <img src="assets/images/logo.png" title="Logo" alt="Site logo" />
          <h3>Sign Up</h3>
          <span>to continue to Netflix</span>
        </div>
        <form method="POST">
          <input type="text" name="firstName" placeholder="First name" required>
          <input type="text" name="lastName" placeholder="Last name" required>
          <input type="text" name="username" placeholder="Username" required>
          <input type="email" name="email" placeholder="Email" required>
          <input type="email" name="email2" placeholder="Confirm email" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="password" name="password2" placeholder="Confirm password" required>
          <input type="submit" name="submitButton" value="SUBMIT">
        </form>
        <a href="login.php" class="sign-in-message">Already have an account? Sign in here!</a>
      </div>
    </div>
  </body>
</html>
