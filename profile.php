<?php
require_once("includes/header.php");
?>

<div class="settings-container column">
  <div class="form-section">
    <form method="POST">
      <h2>User details</h2>

      <input type="text" name="firstName" placeholder="first Name" />
      <input type="text" name="lastName" placeholder="last Name" />
      <input type="text" name="email" placeholder="email" />

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
