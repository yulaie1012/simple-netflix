<?php
require_once("PayPal-PHP-SDK\autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AWAkMGU805xz5_0hJhDUR8n9qvluF3M_2SdnqpyGH_em-pTrc4MmKrObTHOHVnMn9-HI7_OaqV0fxgey',     // ClientID
        'EEr-MLQ4ltrNriE15ty7g1RbdI6w3hUVEPKi35IZQF-ReLDaW_9bxYXjzGb8f8dRiANlKaoq-wSghwwO'      // ClientSecret
    )
);
?>
