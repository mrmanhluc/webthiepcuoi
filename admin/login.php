<?
	session_start();
	$_SESSION['admin'] = "";
	require('conn.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="admin.css" rel="stylesheet">
<div id="adlog">
<h2 style="color:#000; text-align:center">Login</h2>
<form method="post" name="form_login">
<p><label>User: </label></p>
<p><input type="text" name="user" style="width:90%;"></p>
<p><label>Pass: </label></p>
<p><input type="password" name="pass" style="width:90%;"></p>
<p><input type="submit" name="login" value="" style="background:url(../images/login.gif);height:26px;width:65px"></p>
<?
	if(isset($login)){
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];
		$sql=mysql_query("SELECT * FROM admin WHERE user = '$user' AND pass = '$pass'");
		if(mysql_num_rows($sql) >0 ){
			$_SESSION['admin']= 'admin';
			echo("<script>alert('Đăng nhập thành công') </script>");
			echo("<script>window.location='admin.php'</script>");
		}else{
			echo("<script>alert('Sai user hoặc password');</script>");
		}
	}
?>
</form>
</div>