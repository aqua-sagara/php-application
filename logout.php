<?php
session_start();

if (isset($_SESSION["USERID"])) {
  $errorMessage = "logouted。";
}
else {
  $errorMessage = "timeout";
}
// セッション変数のクリア
$_SESSION = array();
// クッキーの破棄
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// セッションクリア
@session_destroy();
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>logout</title>
  </head>
  <body>
  <div><?php echo $errorMessage; ?></div>
  <ul>
  <li><a href="login.php">return login</a></li>
  </ul>
  </body>
</html>