
<div style="margin:20px 60px 20px 200px; padding:30px; border:1px solid #f0f0f0; height:150px; float:left; width: 175px;background:#f0f0f0;border-radius:5px;">
<form action="" method="post" name="foLogin">
	<p class="login"><label class="label">Email :</p>
    <p class="login"></label><input type="text" name="email" class="input"/></p>
    <p class="login"><label class="label">Password :</p>
    <p class="login"></label><input type="password" name="pass" class="input"/></p>
    <p class="login"><input type="submit" name="btnLogin" value="" style="background:url(images/login.gif);height:26px;width:65px" /></p>
    <p class="login">Bạn chưa có tài khoản, ấn vào <a href="#">đây</a> để tạo account mới</p>
  	<?
		if(isset($btnLogin)){
			$email = $_REQUEST['email'];
			$pass = $_REQUEST['pass'];
			$sql_login=mysql_query("select * from khachhang where email='$email' and password='$pass' and trangthaikh=1 ");
			if(mysql_num_rows($sql_login)==0)
			{
				echo("<script>alert('Sai username hoặc password')</script>");
			}
			else 
			{	
				$_SESSION['email']=$email;
				$row=mysql_fetch_array($sql_login);
				$_SESSION['name'] = $row['TenKH'];
				$sql_id="select makh from khachhang where email ='$email'";
				$row = mysql_fetch_array(mysql_query($sql_id));
				$_SESSION['makh'] = $row['makh'];
				
				echo("<script>window.location='?go=home'</script>");
					
			}
		}
	?>
</form>
</div>