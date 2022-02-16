<?php
require_once("includes/header.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/FormSanitizer.php");

$user = new User($con, $userLoggedIn);

$firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : $user->getFirstName();
$lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : $user->getLastName();
$email = isset($_POST["email"]) ? $_POST["email"] : $user->getEmail();

if (isset($_POST["saveDetailsButton"])) {
  $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
  $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
  $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);

  $account = new Account($con);
  if ($account->updateDetails($firstName, $lastName, $email, $userLoggedIn)) {
    // Success
  } else {
    // Failure
  }
}
?>
<div class="settings-container column">
  <div class="form-section">
    <form method="POST">
      <h2>User details</h2>

      <input type="text" name="firstName" placeholder="first Name" value="<?php echo $firstName; ?>" />
      <input type="text" name="lastName" placeholder="last Name" value="<?php echo $lastName; ?>" />
      <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>" />

      <input type="submit" name="saveDetailsButton" value="Save" />
    </form>
  </div>

  <div class="form-section">
    <form method="POST">
      <h2>Update password</h2>

      <input type="password" name="oldPassword" placeholder="Old password" />
      <input type="password" name="newPassword" placeholder="New password" />
      <input type="password" name="newPassword2" placeholder="Confirm new password" />

      <input type="submit" name="savePasswordButton" value="Save" />
    </form>
  </div>
</div>
