<?php
header("Content-Type: text/html; charset=UTF-8");
  session_start();
  
  // �G���[���b�Z�[�W
  $errorMessage = "";
  // ��ʂɕ\�����邽�ߓ��ꕶ�����G�X�P�[�v����
  $viewUserId = htmlspecialchars($_POST["userid"], ENT_QUOTES);

  // ���O�C���{�^���������ꂽ�ꍇ      
  if (isset($_POST["login"])) {

    // �F�ؐ���
    if ($_POST["userid"] == "admin" && $_POST["password"] == "minecraft") {
      // �Z�b�V����ID��V�K�ɔ��s����
      session_regenerate_id(TRUE);
      $_SESSION["USERID"] = $_POST["userid"];
      header("Location: sample.php");
      exit;
    }
    else {
      $errorMessage = "misstake id or pass";
    }
  }

?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>login</title>
  </head>
  <body>
  <form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
  <fieldset>
  <legend>login form</legend>
  <div><?php echo $errorMessage ?></div>
  <label for="userid">ID</label><input type="text" id="userid" name="userid" value="<?php echo $viewUserId ?>">
  <br>
  <label for="password">PASS</label><input type="password" id="password" name="password" value="">
  <br>
  <label></label><input type="submit" id="login" name="login" value="login">
  </fieldset>
  </form>
  </body>
</html>