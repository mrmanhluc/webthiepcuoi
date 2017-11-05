<?
	session_register("cart1");
	$cart1=$_SESSION['cart1'];
	$action=$_REQUEST['action'];
	
	switch($action){
		case "addcay":
		{
			$macay=$_REQUEST['macay'];
			if(isset($cart1[$macay]))
			{
				$soluong=$cart1[$macay]+1;
			}else{
				$soluong=1;
			}
			$cart1[$macay]=$soluong;
			echo "<script>window.history.go(-1)</script>";
			break;		
		}
		case "update":		
			foreach(array_keys($cart1) as $value){
				if($_REQUEST["soluong".$value] >0)
				$cart1[$value] = $_REQUEST["soluong".$value];
			}
			$_SESSION["CART1"] = $cart1;
			break;
		case "del":
		{
			$macay = $_REQUEST['macay'];
			if(isset($cart1[$macay]))
			{
				foreach(array_keys($cart1) as $value){
					if($value != $macay){
						$newcart1[$value] = $cart1[$value];
					}
				}
				$_SESSION['cart1'] = $newcart1;	
				$cart1=$newcart1;
			}
			break;		
		}
		
		case "delall1":
		{
			unset($_SESSION['cart1']);
			echo("<script>window.location='?go=cart1'</script>");
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
function Cart1Send()
{
	if(a){
		document.location='index.php?go=cart1send';
		return true;
	}
	else
	{
		alert('Mời bạn kiểm tra lại');
		return false;
	}
}
</script>
<div id="cart1">

<?
	$ok=1;
	if(isset($_SESSION['cart1']))
	{
		foreach($_SESSION['cart1'] as $k=>$v)
		{
			if(isset($k))
			{
				$ok=2;
			}
		}
	}
	if($ok==2) {
		
?>
	<form name="frmcart1" method="post" action="index?go=cart1" id="frmcart1" onsubmit="return testform();" >
    <input type="hidden" id="action" name="action" value="update" />
    <?
		foreach($_SESSION['cart1'] as $key=>$value )
		{
			$ittem[]=$key;
		}
		$str=implode(",",$ittem);
		$stt=0;
		$total=0;
		$sql1=mysql_query("select * from cay where MaCay in (".$str.")");
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
		while($row1=mysql_fetch_array($sql1)) {
		$Stt++;
	?>
    <tr class="row1">
    	<td><? echo $Stt?></td>
        <td><img src="images/<? echo ($row1['Hinhanh'])?>" width="100" height="150"></td>
        <td><? echo ($row1['TenCay'])?></td>
        <td><input name="soluong<? echo $row1['MaCay']?>" type="text" onChange="return kiemtra(this)" value="<? echo $_SESSION['cart1'][$row1['MaCay']]?> " size="1"  ></td>
        <td><? echo number_format(($row1['Giaban']))?> <font color="red">VNĐ</font></td>
        <td><? echo number_format($_SESSION['cart1'][$row1['MaCay']] * $row1['Giaban'])  ?> <font color="red">VNĐ</font>
			</td>
        <td><a href=''>Del</a></td>
    </tr>
	<?
		$total+= $_SESSION['cart1'][$row1['MaCay']] * $row1['Giaban'];
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
	if(isset($update1))
	{
		
	}
	?>
	<td align="center" colspan="7">
	<input type="submit" name="update" value="Update" >
	<input type="button" name="delete" value="Delete all" onclick="window.location.href='?go=cart1&action=delall1'">
	<input type="button" name="cartsend1" value="Cart send1" onclick="CartSend1()"  ></td>
	</tr>
    </table>
<?
	}else{ 	
	echo "Giỏ hàng chưa có sản phẩm nào cả"; }
?>
</form>
</div>