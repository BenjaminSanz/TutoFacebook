<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();

$conn = mysqli_connect("localhost", "mi_usuario", "mi_contraseña", "mi_bd");

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();

}
echo "conectado a María DB";
echo "<br>";
$fb = new Facebook\Facebook([
  'app_id' => '{app-id}', // Replace {app-id} with your app id
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v3.2',
  ]);

$fb_user = $_GET['fb_user'];

$fb_user_real = json_decode($fb_user, true);
$fb_user_id = $fb_user_real['id'];
$fb_user_email = $fb_user_real['email'];
$fb_user_name = $fb_user_real['name'];
//$fb_user_posta = $fb_user->getProperty('name');
//$fbuser_id = $fb_user->getField('user_id');
$result = $conn->query("SELECT `user_fb` FROM `tutorial` WHERE `user_fb` = $fb_user_id");
$users = $result->fetch_all(MYSQLI_ASSOC);

//cuento cuantos elementos tiene $tabla,
$count = count($users);
//echo $count;
if ($count == 0) {
  $sql = "INSERT INTO `tutorial` (`user_email`, `user_fb`,`user_name` ) VALUES ('$fb_user_email', '$fb_user_id', '$fb_user_name')";
  if (mysqli_query($conn, $sql)) {
      echo "Creamos Usuario";
      $_SESSION["fb_user_id"] = $fb_user_id;
      $_SESSION["fb_user_email"] = $fb_user_email;
      $_SESSION["fb_user_name"] = $fb_user_name;
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}else {
  $result = $conn->query("SELECT * FROM `tutorial` WHERE `user_fb` = $fb_user_id");
  $user = $result->fetch_all(MYSQLI_ASSOC);
  //print_r($user);
  $_SESSION["fb_user_id"] = $user[0]["user_fb"];
  $_SESSION["user_email"] = $user[0]["user_email"];
  $_SESSION["user_name"] = $user[0]["user_name"];
  echo "Logueamos Usuario";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h4>Email:<small> <?php echo $_SESSION["user_email"]; ?></small> </h4>
    <h4>Name:<small> <?php echo $_SESSION["user_name"]; ?></small> </h4>
    <br>
    <br>
      <img src="http://graph.facebook.com/<?php echo $fb_user_id;?>/picture?type=large&redirect=true&width=250&height=250" alt="">
  </body>
</html>
