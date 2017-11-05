<script>
/*	function checkshipdate(val)
	{
		//alert(val);
			
		valid=true;
		d=new Date();
		ngay=d.getDate();
		thang=d.getMonth()+1;
		nam=d.getFullYear();
		var arr=val.split("-");
		//alert(nam+"/"+thang+"/"+ngay);
		
		//for(i=0;i<arr.length;i++)
//			alert(arr[i]);
//		
		//
		if(eval(arr[1])>12)
		{
			alert('Mời bạn nhập lại tháng');
			valid= false;
		}
		if(eval(arr[2])>31)
		{
			alert('Mời bạn nhập lại ngày');
			valid= false;
		}
		if(eval(arr[0])<nam )
		{
			alert('Mời bạn nhập lại ngày nhận hàng');
			valid= false;
		}	
		if(eval(arr[1])<thang && eval(arr[0])==nam )
		{
			alert('Mời bạn nhập lại ngày nhận hàng');
			valid= false;
		}
		if(eval(arr[2])<ngay+1 && eval(arr[1])==thang && eval(arr[0])==nam )
		{
			alert('Mời bạn nhập lại ngày nhận hàng');
			valid= false;
		}
		return valid;	
	} */
</script>


<script>
$(document).ready(function(){
        $('#frmsend').validate();

});  
</script>
<?
	$tongtien= $_SESSION['total'];
?>
<?
	if($_SESSION['email']=="")
	echo"<script>window.location='?go=cart_login'</script>";
?>
<? 
	$Khachhang=mysql_query("select * from khachhang where email = '".$_SESSION['email']."' ");
	$row=mysql_fetch_array($Khachhang);
?>


<div id="cartsend1">
<form name="frmsend" method="post" id="frmsend" onsubmit="return checkshipdate(frmsend.date.value)">
<fieldset>
<legend style="font-weight:bold"> Thông tin tài khoản </legend>
<p><label>Tên khách hàng:</label> <strong><? echo ($row['TenKH']) ?></strong> </p>
<p><label>Số điện thoại:</label> <strong><? echo ($row['SoDT'])?></strong></p>
<p><label>Địa chỉ:</label> <strong><? echo ($row['DiaChi'])?></strong></p>
<p><label>Email</label> <strong><? echo ($row['Email'])?></strong></p>
</fieldset>
<fieldset>
<legend style="font-weight:bold" >Thông tin người nhận</legend>
<p><label>Tên người nhận: </label><input type="text" name="TenNN" class="required"></p>
<p><label>Địa chỉ giao hàng: </label><input type="text" name="DiachiNN" class="required "></p>
<p><label>Số điện thoại người nhận: </label><input type="text" name="sdtNN" class="required number"></p>
<p><label>Ngày nhận hàng: </label>

  <input type="text" name="ngaythang" id="textfield"  class="required dateISO"/>
  <font color="red">(yyyy-mm-dd)</font>
</p>
</fieldset>

<div style="width:200px; margin:10px auto;"><input type="submit" name="btnsend" value="" style="background:url(images/continue.gif); width:83px; height:26px; margin:10px" onClick="return checkshipdate(frmsend.ngaythang.value);"/></div>
<?
	if(isset($btnsend) && isset($_SESSION['cart1']))
	{
		// Insert vao bang hoa don
		$tennn=$_REQUEST['TenNN'];
		$diachinn=$_REQUEST['DiachiNN'];
		$sdtnn=$_REQUEST['sdtNN'];
		$date=$_REQUEST['ngaythang'];
		$makh=$row['MaKH'];
		mysql_query("insert hoadon (MaKH,Nguoinhan,SoDT ,DiachiNN,NgayLap) values ('$makh','$tennn','$sdtnn','$diachinn',Date(Now()))");	
		//insert vao bang hoadonchitiet
		//Tim MaHD lon nhat
		$sql=mysql_query("select MaHD from hoadon order by MaHD desc limit 0,1 ");
		while($r=mysql_fetch_array($sql))
		{
			$mahd=$r['MaHD'];
		}
		foreach(array_keys($_SESSION['cart1']) as $values)
		{
			$sql1=mysql_query("select * from cay where MaCay =$values");
			while($res=mysql_fetch_array($sql1))
			{
				$Giaban=$res['Giaban'];
			}
			mysql_query("insert hondonct (MaHD,MaCay,Ngaynhan,Soluong,Tongtien) values ('$mahd','$values','$date','".$_SESSION['cart1'][$values]."','$tongtien')");
			echo $date,$tongtien;
		}
	unset($_SESSION['cart1']);
	unset($_SESSION['total']);
	echo("<script>window.location='?go=success'</script>");
	}
?>
</form>
</div>
