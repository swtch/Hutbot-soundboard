<?php
include __DIR__.'/vendor/autoload.php';

use Discord\OAuth\Discord as DiscordProvider;

define("COOKIE_NAME",     "isGranted");

$redirectUri =  'http://'.$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
//$redirectUri = str_replace('index', 'soundboard',$redirectUri);
$redirectUri =  'http://www.hutbot.xyz/';

$provider = new DiscordProvider([
    'clientId'     => '361795986474926081',
    'clientSecret' => 'Q1EpjiRnqwIDjT8rNtFXckuX9sTD7Wpc',
    'redirect_uri' => $redirectUri,
]);

if (! isset($_GET['code'])) {
    echo '<a href="'.$provider->getAuthorizationUrl().'">Login with Discord</a>';
} else {
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code'],
    ]);
    // Get the user object.
    $user = $provider->getResourceOwner($token);

    $ch = curl_init();
    /*curl_setopt($ch, CURLOPT_URL, "http://35.156.99.232:3000/isGranted/".$user.id );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    var_dump($response);
    curl_close($ch);*/
    $response = true;
    if (true === $response) {
        setcookie(COOKIE_NAME, $user->getId(), time()+36000);
        header('Location: ./soundboard.php');
        session_set_cookie_params(0);
        session_start();
    } else {
        setcookie(COOKIE_NAME, NULL, -1);
    }


}
