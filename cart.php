<?
	session_register("cart");
	$cart=$_SESSION['cart'];
	$action=$_REQUEST['action'];
	
	switch($action){
		case "add":
		{
			$mathiep=$_REQUEST['mathiep'];
			if(isset($cart[$mathiep]))
			{
				$soluong=$cart[$mathiep]+1;
			}else{
				$soluong=1;
			}
			$cart[$mathiep]=$soluong;
			echo "<script>window.history.go(-1)</script>";
			break;		
		}
		case "update":		
			foreach(array_keys($cart) as $value){
				if($_REQUEST["soluong".$value] >0)
				$cart[$value] = $_REQUEST["soluong".$value];
			}
			$_SESSION["CART"] = $cart;
			break;
		case "del":
		{
			$mathiep = $_REQUEST['mathiep'];
			if(isset($cart[$mathiep]))
			{
				foreach(array_keys($cart) as $value){
					if($value != $mathiep){
						$newcart[$value] = $cart[$value];
					}
				}
				$_SESSION['cart'] = $newcart;	
				$cart=$newcart;
			}
			break;		
		}
		
		case "delall":
		{
			unset($_SESSION['cart']);
			echo("<script>window.location='?go=cart'</script>");
			break;
		}
			}
?>
<script>
	var a = true;
function kiemtra(txt)
{
	s = txt.value;
	var IsNumber=true;
	var s1=String(s);
	
	var re=/\ /;
	if(s1=='')
	{
		alert('Mời bạn nhập số lượng');
		txt.focus();
		IsNumber=false;
		a=false;
	}
	else
		if(isNaN(s1))
		{
			alert('số lượng đặt phải là số');
			txt.focus();
			IsNumber=false;
			a=false;
		}else
			if(re.test(s1))
			{
				alert('số lượng đặt phải là số');
				txt.focus();
				IsNumber=false;
				a=false;
			}else
			{
				
				s2=parseInt(s1);
				if(s2<=0 || s2!=eval(s1))
				{
					alert('số lượng đặt phải là số nguyên dương');
					txt.value=s2;
					IsNumber=false;
					a=false;			
				}
			}
	a=IsNumber;	
	return IsNumber;
}
function testform()
{
	if(a){
		return true;}
	else
	{
		alert('Mời bạn kiểm tra lại');
		return false;
	}
}
function CartSend()
{
	if(a){
		document.location='index.php?go=cartsend';
		return true;
	}
	else
	{
		alert('Mời bạn kiểm tra lại');
		return false;
	}
}
</script>
<div id="cart">

<?
	$ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
				$ok=2;
			}
		}
	}
	if($ok==2) {
		
?>
	<form name="frmcart" method="post" action="index?go=cart" id="frmcart" onsubmit="return testform();" >
    <input type="hidden" id="action" name="action" value="update" />
    <?
		foreach($_SESSION['cart'] as $key=>$value )
		{
			$ittem[]=$key;
		}
		$str=implode(",",$ittem);
		$stt=0;
		$total=0;
		$sql=mysql_query("select * from thiep where MaThiep in (".$str.")");
	?>
    <table border="1" width="100%">
    <tr class="rowtitle">
    	<td width="10%" >Số thứ tự</td>
        <td width="26%"> Hình ảnh</td>
        <td width="20%">Tên sản phẩm</td>
        <td width="5%">Số lượng</td>
        <td width="15%">Giá thành</td>
        <td width="14%">Tổng tiền</td>
        <td width="10%">Del</td>
    </tr>
    <?
		while($row=mysql_fetch_array($sql)) {
		$Stt++;
	?>
    <tr class="row">
    	<td><? echo $Stt?></td>
        <td><img src="images/<? echo ($row['Hinhanh'])?>" width="100" height="150"></td>
        <td><? echo ($row['TenThiep'])?></td>
        <td><input name="soluong<? echo $row['MaThiep']?>" type="text" onChange="return kiemtra(this)" value="<? echo $_SESSION['cart'][$row['MaThiep']]?> " size="1"  ></td>
        <td><? echo number_format(($row['Giaban']))?> <font color="red">VNĐ</font></td>
        <td><? echo number_format($_SESSION['cart'][$row['MaThiep']] * $row['Giaban'])  ?> <font color="red">VNĐ</font>
			</td>
        <td><a href='?go=cart&action=del&mathiep=<? echo ($row['MaThiep'])?>'>Del</a></td>
    </tr>
	<?
		$total+= $_SESSION['cart'][$row['MaThiep']] * $row['Giaban'];
		$_SESSION['total']=$total;
		}
	?>
	<tr>
    
      <td colspan="5" align="right">Total:</td>
      <td colspan="2" align="left"><? echo(number_format($total))?><font color="red"> VNĐ</font></td>
	</tr>
	
	<tr height="30" valign="middle" align="center">
	<td align="center" colspan="7">
	<hr></td>
	</tr>
	
    <tr height="30" valign="middle" align="center">
    <?
	if(isset($update))
	{
		
	}
	?>
	<td align="center" colspan="7">
	<input type="submit" name="update" value="Update" >
	<input type="button" name="delete" value="Delete all" onclick="window.location.href='?go=cart&action=delall'">
	<input type="button" name="cartsend" value="Cart send" onclick="CartSend()"  ></td>
	</tr>
    </table>
<?
	}else{ 	
	echo "Giỏ hàng chưa có sản phẩm nào cả"; }
?>
</form>
</div>