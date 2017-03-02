<?php
session_start();

if (isset($_SESSION["USERID"])) {
  $errorMessage = "logouted�B";
}
else {
  $errorMessage = "timeout";
}
// �Z�b�V�����ϐ��̃N���A
$_SESSION = array();
// �N�b�L�[�̔j��
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// �Z�b�V�����N���A
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