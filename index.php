<?php
include __DIR__.'/vendor/autoload.php';

use Discord\OAuth\Discord as DiscordProvider;

define("COOKIE_NAME","isGranted");

$redirectUri =  'http://'.$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$redirectUri =  'http://www.hutbot.xyz/';
$ini_array = parse_ini_file("config.ini");
$provider = new DiscordProvider([
    'clientId'     => $ini_array["clientId"],
    'clientSecret' => $ini_array["clientSecret"],
    'redirect_uri' => $ini_array["redirect_uri"],
]);

if (! isset($_GET['code'])) {
    ?>

    <!DOCTYPE html>
    <html >
    <head>
        <meta charset="UTF-8">
        <title>Custom Login Form</title>
        <link rel="stylesheet" href="assets/css/home.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="./images/avatar_2px.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php echo '<a href="'.$provider->getAuthorizationUrl().'"> <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Se connecter avec discord ! </button></a>'; ?>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    </body>
    </html>

    <?php

} else {
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code'],
    ]);
    // Get the user object.
    $user = $provider->getResourceOwner($token);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://35.156.99.232:3000/isGranted/".$user->getId() );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if (true === (bool)$response) {
        setcookie(COOKIE_NAME, hash('sha512', $user->getId()), time()+36000);
        header('Location: ./soundboard.php');
    } else {
        setcookie(COOKIE_NAME, NULL, -1);
    }


}
