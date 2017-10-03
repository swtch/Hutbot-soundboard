<?php
include __DIR__.'/vendor/autoload.php';
use Discord\OAuth\Discord as DiscordProvider;
$redirectUri =  'http://'.$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$redirectUri = str_replace('index', 'soundboard',$redirectUri);
//$redirectUri =  'http://www.hutbot.xyz/';
var_dump($redirectUri);
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

    var_dump($user);

    // Get the guilds and connections.
    $guilds = $user->guilds;
    $connections = $user->connections;

    // Accept an invite
    $invite = $user->acceptInvite('https://discord.gg/0SBTUU1wZTUo9F8v');

    // Get a refresh token
    $refresh = $provider->getAccessToken('refresh_token', [
        'refresh_token' => $getOldTokenFromMemory->getRefreshToken(),
    ]);

    // Store the new token.
}
