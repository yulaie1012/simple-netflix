<?php
class FormSanitizer {
  public static function sanitizeFormName($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = strtolower($inputText);
    $inputText = ucfirst($inputText);
    return $inputText;
  }
}
?>