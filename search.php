<form name="search" method="post">
<?
	$TenThiep=$_REQUEST['tenthiep']; 
	$display=6;
	if(isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
		$page=$_REQUEST['page'];
	}else{
		$res=mysql_query("select count(MaThiep) from thiep where TenThiep like '%$TenThiep%'");
		$pt=mysql_fetch_array($res);
		$record=$pt[0];
		if($record>$display){
			$page=ceil($record/$display);
		}else{
			$page=1;
		}
	}
		$start= (isset($_REQUEST['start']) && (int)$_REQUEST['start']) ? $_REQUEST['start'] : 0; 
	$sql1=mysql_query("select * from thiep where ( TrangThaiThiep=1 and TenThiep like '%$TenThiep%')  LIMIT $start,$display");
	while($row=mysql_fetch_array($sql1)){
?>
<div id="prod">
<a href="?go=prodetail&mathiep=<? echo $row['MaThiep'] ?>"><img src="images/<? echo $row['Hinhanh'] ?>" /></a>
<p><a href="?go=prodetail&mathiep=<? echo $row['MaThiep'] ?>"><span class="a"><? echo $row['TenThiep'] ?></span></a></p>
<p style="color:red"><? echo number_format($row['Giaban']) ?> VNĐ</p>  
<p><input type="button" value="" name="add" style="background:url(images/addtocart.gif); height:27px; width:93px;" onclick="window.location.href='?go=cart&action=add&mathiep=<? echo ($row['MaThiep']);?>'"></p>
  
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
		echo"<li><a href='?go=search&start=$prev'</a>Pre</li>";
	}
	for($i=1; $i<=$page; $i++)
	{
		if($current !=$i)
			{
			echo"<li><a href='?go=search&start=".($display*($i-1))."'>$i</a></li>";
			}
			else
			{
						echo"<li class='current'>$i</li>";
			}
	}
	if($current!=$page)
	{
			echo"<li><a href='?go=search&start=$next'>Next</a></li>";
	}
			
?></ul></div>

</form>