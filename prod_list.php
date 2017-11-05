<?php 
	$sql_loait ="select * from loaithiep where MaLoai='$_GET[maloai]'";
	 $query_loait=mysql_query($sql_loait);
	 $dong_loait=mysql_fetch_array($query_loait);
?>
<p style=" font-size:18px; font-family:Arial, Helvetica, sans-serif; text-align: left; color:#FFFFFF; background:#700; position: relative; padding: 12px;"><?php echo $dong_loait['TenLoai'] ?></p>
<form name="list_" method="post">
<? 
	$MaLoai=$_REQUEST['maloai'];
	$hangsx=mysql_fetch_array(mysql_query("select tenloai from loaithiep where Maloai=$MaLoai"));
	$display=9;
	if(isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
		$page=$_REQUEST['page'];
	}else{
		$res=mysql_query("select count(MaThiep) from thiep inner join loaithiep on thiep.maloai=loaithiep.maloai where loaithiep.maloai=$MaLoai");
		$pt=mysql_fetch_array($res);
		$record=$pt[0];
		if($record>$display){
			$page=ceil($record/$display);
		}else{
			$page=1;
		}
	}
		$start= (isset($_REQUEST['start']) && (int)$_REQUEST['start']) ? $_REQUEST['start'] : 0; 
	$sql1=mysql_query("select * from thiep inner join loaithiep on thiep.maloai=loaithiep.maloai where (TrangThaiThiep=1 and loaithiep.maloai=$MaLoai)  order by Mathiep desc LIMIT $start,$display");
	
	while($row=mysql_fetch_array($sql1)){
?>
</form>
<div id="prod">
<a href="?go=prodetail&mathiep=<? echo $row['MaThiep'] ?>"><img src="images/<? echo $row['Hinhanh'] ?>" /></a>
<p><a href="?go=prodetail&mathiep=<? echo $row['MaThiep'] ?>"><span class="a"><? echo $row['TenThiep'] ?></span></a></p>
<p style="color:red"><? echo number_format($row['Giaban']) ?> VNĐ</p>  

  
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
<?php 
	$sql_thiephd ="select * from loaithiep where MaLoai=1";
	 $query_thiephd=mysql_query($sql_thiephd);
	 $dong_thiephd=mysql_fetch_array($query_thiephd);
?>