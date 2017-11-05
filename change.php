<?
	$sql=mysql_query("select * from khachhang where makh = ".$_SESSION['makh']."");
	$row = mysql_fetch_array($sql);
?>
<script> 
	$(document).ready(function(){
        $('#frm_change').validate();

});  
</script>

<div id="registry">
	<form method="post" name="frm_change" id="frm_change">
    <p class="login">
    	<label>Password: </label><span class="red">*</span>
    </p>
    <p class="login">
        <input type="password" name="pass" class="required" minlength="6" maxlength="15" id="pass" style="width:200px" value="<? echo $row['Password']?>"/>
    </p>
    <p class="login">
    	<label>Re-Password: </label><span class="red">*</span>
     </p>
     <p class="login">
        <input type="password" name="re_pass" class="required" minlength="6" maxlength="15" equalTo="#pass" style="width:200px"/>
    </p>
    <p class="login">
    	<label>Số điện thoại: </label><span class="red">*</span>
    </p>
    <p class="login">
        <input type="text" name="phone" class="required number" minlength="8" maxlength="15" style="width:200px" value="<? echo $row['SoDT']?>" />
    </p>
    <p class="login">
    	<label>Địa chỉ: </label><span class="red">*</span>
    </p>
    <p class="login">
        <input type="text" name="location"  class="required" style="width:200px" maxlength="100" value="<? echo $row['Diachi']?>" />
    </p>
    <p class="login" style="margin-top:10px;">
    	<input type="submit" name="submit" value="" style="background:url(images/continue.gif);width:83px; height:26px" />
    </p>
    <?
		if(isset($submit)){
			$pass = $_REQUEST['pass'];
			$phone = $_REQUEST['phone'];
			$loca = $_REQUEST['location'];
			$makh = $row['MaKH'];
			mysql_query("update khachhang set password = '$pass' where makh = ".$_SESSION['makh']." ");
			mysql_query("update khachhang set SoDT = '$phone' where makh = ".$_SESSION['makh']." ");
			mysql_query("update khachhang set Diachi = '$loca' where makh = ".$_SESSION['makh']." ");
			echo("<script>alert('Thay đổi thành công');</script>");
			echo ("<script>window.location='?go=home'</script>");
		}
	?>
    </form>
</div>