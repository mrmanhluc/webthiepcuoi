<div id="subhome1">
<p>
	  SẢN PHẨM CÂY TIỀN
</p>
</div>
<form name="list_prod" method="post">
<? 
	$display=3;
	if(isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
		$page=$_REQUEST['page'];
	}else{
		$res1=mysql_query('select count(MaCay) from cay');
		$pt1=mysql_fetch_array($res1);
		$record1=$pt1[0];
		if($record1>$display){
			$page=ceil($record1/$display);
		}else{
			$page=1;
		}
	}
		$start= (isset($_REQUEST['start']) && (int)$_REQUEST['start']) ? $_REQUEST['start'] : 0; 
	$sql3=mysql_query("select * from cay where TrangThaiCay=1 LIMIT $start,$display");
	
	while($row1=mysql_fetch_array($sql3)){
?>
<div id="prod">
<a href=""><img src="images/<? echo $row1['Hinhanh'] ?>" /></a>
<p><a href=""><span class="a"><? echo $row1['TenCay'] ?></span></a></p>
<p style="color:red"><? echo number_format($row1['Giaban']) ?> VNĐ</p>  

  
</div> 
<!--end # sanpham-->
  <?
	}
?></div>

</form>