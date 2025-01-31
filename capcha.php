<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $secretKey = '6Lf69MgqAAAAAOvy5sRhSfSVXWGwpsTBXFb6L9Pn';
    $captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

    if (empty($captcha)) {
        echo 'Please check the CAPTCHA form.';
        exit;
    }

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . urlencode($secretKey) . "&response=" . urlencode($captcha));
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
        echo 'CAPTCHA verification successful. Form submitted.';
    } else {
        echo 'CAPTCHA verification failed. Please try again.';
    }
}
?>