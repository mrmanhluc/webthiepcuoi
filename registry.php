<script> 
	$(document).ready(function(){
        $('#frm_registry').validate();

});  
</script>

<div id="registry">
<form method="post" name="frm_registry" id="frm_registry"  >
	<p class="login">
    	<label>Email: </label><span class="red">*</span>
    </p>
    <p class="login">
        <input type="text" name="email" class="required email" maxlength="50" style="width:200px" />
    </p>
    <p class="login">
    	<label>Password: </label><span class="red">*</span>
    </p>
    <p class="login">
        <input type="password" name="pass" class="required" minlength="6" maxlength="15" id="pass" style="width:200px"/>
    </p>
    <p class="login">
    	<label>Re-Password: </label><span class="red">*</span>
     </p>
     <p class="login">
        <input type="password" name="re_pass" class="required" minlength="6" maxlength="15" equalTo="#pass" style="width:200px"/>
    </p>
    <p class="login">
    	<label>Tên: </label><span class="red">*</span>
    </p>
    <p class="login">    
        <input type="text" name="name" class="required" maxlength="30" style="width:200px"/>
    </p>
    <p class="login">
    	<label>Số điện thoại: </label><span class="red">*</span>
    </p>
    <p class="login">
        <input type="text" name="phone" class="required number" minlength="8" maxlength="30" style="width:200px" />
    </p>
    <p class="login">
    	<label>Địa chỉ: </label><span class="red">*</span>
    </p>
    <p class="login">
        <input type="text" name="location"  class="required" style="width:200px" maxlength="100"/>
    </p>
    <p class="login">
    	<label>Giới tính: </label><span class="red">*</span>
	<input type="radio" name="gender" id="radio" value="Nam"   />
	Nam
	<input type="radio" name="gender" id="radio2" value="Nữ" />
    Nữ
    </p>     
    <p class="login" style="margin-top:10px;">
    	<input type="submit" name="submit" value="" style="background:url(images/continue.gif);width:83px; height:26px" />
    </p>
    <?
		if(isset($submit)){
			$email = $_REQUEST['email'];
			$pass = $_REQUEST['pass'];
			$name = $_REQUEST['name'];
			$phone = $_REQUEST['phone'];
			$loca = $_REQUEST['location'];
			$gender = $_REQUEST['gender'];
			if($gender == 'Nam'){
				$sex=1;
			}else{
				$sex=2;
			}
			if(mysql_num_rows(mysql_query("select email from khachhang where email='$email'"))>0){
				echo("<script>alert('Email này đã được đăng kí mới bạn dùng email khác');</script>");
			}else{
				mysql_query("insert into khachhang(email,password,tenkh,sodt,diachi,gioitinh) values ('$email','$pass','$name','$phone','$loca','$sex')");
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $name;
				echo("<script>window.location='?go=home'</script>");
				$sql_id="select makh from khachhang where email ='$email'";
				$row = mysql_fetch_array(mysql_query($sql_id));
				$_SESSION['makh'] = $row['makh'];
 				
			}
		}
	?>
</form>
</div>