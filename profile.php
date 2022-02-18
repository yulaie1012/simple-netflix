<?php
require_once("includes/header.php");
require_once("includes/paypalConfig.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");

$user = new User($con, $userLoggedIn);

$firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : $user->getFirstName();
$lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : $user->getLastName();
$email = isset($_POST["email"]) ? $_POST["email"] : $user->getEmail();

$detailsMessage = "";
$passwordMessage = "";

if (isset($_POST["saveDetailsButton"])) {
  $firstName = FormSanitizer::sanitizeFormName($_POST["firstName"]);
  $lastName = FormSanitizer::sanitizeFormName($_POST["lastName"]);
  $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);

  $account = new Account($con);
  if ($account->updateDetails($firstName, $lastName, $email, $userLoggedIn)) {
    $detailsMessage = "<div class='alert-success'>
                         Details updated successfully!
                       </div>";
  } else {
    $errorMessage = $account->getFirstError();
    $detailsMessage = "<div class='alert-error'>
                         $errorMessage
                       </div>";
  }
}

if (isset($_POST["savePasswordButton"])) {
  $oldPassword = FormSanitizer::sanitizeFormName($_POST["oldPassword"]);
  $newPassword = FormSanitizer::sanitizeFormName($_POST["newPassword"]);
  $newPassword2 = FormSanitizer::sanitizeFormEmail($_POST["newPassword2"]);

  $account = new Account($con);
  if ($account->updatePassword($oldPassword, $newPassword, $newPassword2, $userLoggedIn)) {
    $passwordMessage = "<div class='alert-success'>
                         Details updated successfully!
                       </div>";
  } else {
    $errorMessage = $account->getFirstError();
    $passwordMessage = "<div class='alert-error'>
                         $errorMessage
                       </div>";
  }
}

if (isset($_GET['success']) && $_GET['success'] == 'true') {
  $token = $_GET['token'];
  $agreement = new \PayPal\Api\Agreement();

  try {
    // Execute agreement
    $agreement->execute($token, $apiContext);

    // Update user's account status

  } catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
  } catch (Exception $ex) {
    die($ex);
  }
} else if (isset($_GET['success']) && $_GET['success'] == 'false') {
  echo "user canceled agreement";
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

      <div class="message">
        <?php echo $detailsMessage; ?>
      </div>
    </form>
  </div>

  <div class="form-section">
    <form method="POST">
      <h2>Update password</h2>

      <input type="password" name="oldPassword" placeholder="Old password" />
      <input type="password" name="newPassword" placeholder="New password" />
      <input type="password" name="newPassword2" placeholder="Confirm new password" />

      <input type="submit" name="savePasswordButton" value="Save" />

      <div class="message">
        <?php echo $passwordMessage; ?>
      </div>
    </form>
  </div>

  <div class="form-section">
    <h2>Subscription</h2>
    <?php
    if ($user->getIsSubscribed()) {
      echo "<h3>You are subscribed! Go to PayPal to cancel.</h3>";
    } else {
      echo "<a href='billing.php'>Subscribe to Netflix</a>";
    }
    ?>
  </div>
</div>
