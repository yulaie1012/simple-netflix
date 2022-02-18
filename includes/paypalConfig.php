<?php
require_once("PayPal-PHP-SDK\autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ASqV_K36UV-3az0oUKIvPIrL-ccyBbRf03T98PC90WURjXUEiuC7TkLkn1YQNm-_0PHlF2Ul36xWJFi3',     // ClientID
        'EMOUCRjuXOxQg8VJR3v2OHIwwx_XpN1Zjj7jEDW1Q0TZq-dFAINlTNEF9HehSAQLI178gOK1IYSEur57'      // ClientSecret
    )
);
?>
