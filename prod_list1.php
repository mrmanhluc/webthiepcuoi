<?php 
	$sql_loaic ="select * from loaicay where MaLoai='$_GET[maloai]'";
	 $query_loaic=mysql_query($sql_loaic);
	 $dong_loaic=mysql_fetch_array($query_loaic);
?>
<p style=" font-size:18px; font-family:Arial, Helvetica, sans-serif; text-align: left; color:#FFFFFF; background:#700; position: relative; padding: 12px;"><?php echo $dong_loaic['TenLoai'] ?></p>
<form name="list_" method="post">
<? 
	$MaLoai=$_REQUEST['maloai'];
	$hangsx=mysql_fetch_array(mysql_query("select tenloai from loaicay where Maloai=$MaLoai"));
	$display=6;
	if(isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
		$page=$_REQUEST['page'];
	}else{
		$res=mysql_query("select count(MaCay) from cay inner join loaicay on cay.maloai=loaicay.maloai where loaicay.maloai=$MaLoai");
		$pt=mysql_fetch_array($res);
		$record=$pt[0];
		if($record>$display){
			$page=ceil($record/$display);
		}else{
			$page=1;
		}
	}
		$start= (isset($_REQUEST['start']) && (int)$_REQUEST['start']) ? $_REQUEST['start'] : 0; 
	$sql1=mysql_query("select * from cay inner join loaicay on cay.maloai=loaicay.maloai where (TrangThaiCay=1 and loaicay.maloai=$MaLoai)  order by Macay desc LIMIT $start,$display");
	
	while($row=mysql_fetch_array($sql1)){
?>
<div id="prod">
<a href=""><img src="images/<? echo $row['Hinhanh'] ?>" /></a>
<p><a href=""><span class="a"><? echo $row['TenCay'] ?></span></a></p>
<p style="color:red"><? echo number_format($row['Giaban']) ?> VNĐ</p>  
<p><input type="button" value="" name="add" style="background:url(images/addtocart.gif); height:27px; width:93px;"  onclick="window.location.href='?go=cart1&action=addcay&macay=<? echo ($row['MaCay']);?>'"/></p>
  
</div> 
<!--end # sanpham-->
  <?
	}
?></div>
<div id="phantrang"  > 
  <ul>
    <?
	if($page>1)
	$next = $start + $display;
	$prev = $start - $display;
	$current = ($start/$display) + 1 ;
	if($current!=1)
	{
		echo"<li><a href='?go=prolist&maloai=$MaLoai&start=$prev'</a>Pre</li>";
	}
	for($i=1; $i<=$page; $i++)
	{
		if($current !=$i)
			{
			echo"<li><a href='?go=prolist&maloai=$MaLoai&start=".($display*($i-1))."'>$i</a></li>";
			}
			else
			{
						echo"<li class='current'>$i</li>";
			}
	}
	if($current!=$page)
	{
			echo"<li><a href='?go=prolist&maloai=$MaLoai&start=$next'>Next</a></li>";
	}
			
?></ul></div>
</form>
