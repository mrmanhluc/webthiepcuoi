<?
	$sql=mysql_query("select * from khachhang where makh = ".$_SESSION['makh']."");
	$row = mysql_fetch_array($sql);
?>

<div id="registry" style="width:400px;">
	<p class="login" style="padding:5px;"><p >Email:</p> <span class="info"><? echo $row['Email']?></span></p>
    <p class="login" style="padding:5px;"><p>Tên khách hàng:</p> <span class="info"><? echo $row['TenKH']?></span></p>
    <p class="login" style="padding:5px;"><p>Số điện thoại:</p> <span class="info"><? echo $row['SoDT']?></span></p>
    <p class="login" style="padding:5px;"><p>Địa chỉ:</p> <span class="info"><? echo $row['Diachi']?></span></p>
    <p class="login" style="padding:5px;"><p>Giới tính:</p> <span class="info"><? if($row['Gioitinh'] == 1) { echo Nam;}else{ echo Nữ ;}?></span></p>
    <br/>
    <p> Bạn có muốn <i><a href="?go=change&MaKH=<? echo $row['MaKH']?>">thay đổi</a></i> thông tin cá nhân?</p>
</div>