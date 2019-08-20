<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();
$fb = new Facebook\Facebook([
  'app_id' => '632610147226988', // Replace {app-id} with your app id
  'app_secret' => 'b41ec985abd1e69e6def279d1496267e',
  'default_graph_version' => 'v3.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://somosioticos.com/tutorial/fb-callback.php', $permissions);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
    <div class="">
      <small>Email</small>
      <input type="text" name="" value="">
    </div>
    <br>
    <div class="">
      <small>Password</small>
      <input type="text" name="" value="">
    </div>
    <br>
    <button type="button" name="button">Go!</button>
    <br>
    <br>
    <a href="<?php echo $loginUrl; ?>">Login with facebook</a>
  </form>
  </body>
</html>
