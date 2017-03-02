<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}

echo "<font size='6'>Hello " . $_SESSION["USERID"] . "";
?>

<!doctype html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>mypage</title>
  </head>
  <body background="2fbafcfa (19).jpg">
  <ul><img src="file:///C:\Users\aquan\Pictures\school.jpg">
<font color="#ff0000">
  <li><a href="logout.php">logout</a></li>
  	   <form method="post">
<li><input type="text" name="search" value="" autofocus>
	 
	<p>  <input type="submit" value="検索する"></p>
	  </form>
  </ul>
  </body>
</html>
<?php
// ホスト名
$host = "localhost" ;
$link = pg_connect("host=localhost dbname=desk user=postgres password=test");
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}

print('接続に成功しました。<br>');
// ホスト名をIPアドレスに変換 ( → 54.65.168.148)
#echo $_POST["search"];
#if(isset($_POST[!!"search"]))
#echo gethostbyname( $host ) ;
if(isset($_POST["search"])){
	echo $_POST["search"];
}
if($_POST["search"]!=null){
	$sql="SELECT * FROM music where name like '%{$_POST["search"]}%' or  path like '%{$_POST["search"]}%'";

	$result = pg_query($sql);
 	$rows   = pg_numrows($result);  // レコードの総数を取得
  	$row    = 0;  // 行カウンタを初期化

  	echo "<TABLE border=1><TR><TH>name</TH><TH>path</TH></TR>\n";

  		while( $row < $rows ){
    		$DATA = pg_fetch_object( $result, $row );  // 結果セットからレコードを1行取得する
    		echo "<TR><TD>{$DATA->name}</TD><TD>{$DATA->path}</TD></TR>\n";
    		// オブジェクトの場合は、変数名->カラム名 でそのカラムのデータを参照できます

   			 
  
  			echo "</TABLE>\n";
  			echo "$DATA->path";
				if(strpos($DATA->path,'.mp3')){
 					 echo "<p><audio controls> <source src=\"$DATA->path\"</audio>";
  					echo "<p>\"$DATA->name\" <a href=\"$DATA->path\" download=\"$DATA->name.mp3\">ダウンロード</a></p>";
				}
				if (strpos($DATA->path,'jpg')){
					echo "<p><img src=\"$DATA->path\"</p>";
				}
				if (!$result) {
    			die('クエリーが失敗しました。'.pg_last_error());
    
				}	
				$row ++;  // 行カウンタを進める
		}
}
?>