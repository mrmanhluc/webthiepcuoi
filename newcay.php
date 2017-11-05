<form name="list_prod" method="post">
<? 
	$display=6;
	if(isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
		$page=$_REQUEST['page'];
	}else{
		$res=mysql_query('select count(MaCay) from cay');
		$pt=mysql_fetch_array($res);
		$record=$pt[0];
		if($record>$display){
			$page=ceil($record/$display);
		}else{
			$page=1;
		}
	}
		$start= (isset($_REQUEST['start']) && (int)$_REQUEST['start']) ? $_REQUEST['start'] : 0; 
	$sql1=mysql_query("select * from cay where TrangThaiCay=1 order by macay desc LIMIT $start,$display");
	
	while($row=mysql_fetch_array($sql1)){
?>
<div id="prod">
<a href=""><img src="images/<? echo $row['Hinhanh'] ?>" /></a>
<p><a href=""><span class="a"><? echo $row['TenCay'] ?></span></a></p>
<p style="color:red"><? echo number_format($row['Giaban']) ?> VNĐ</p>  
<p><input type="submit" value="" name="add" style="background:url(images/addtocart.gif); height:27px; width:93px;"></p>
  
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
		echo"<li><a href='?go=newcay&start=$prev'</a>Pre</li>";
	}
	for($i=1; $i<=$page; $i++)
	{
		if($current !=$i)
			{
			echo"<li><a href='?go=newcay&start=".($display*($i-1))."'>$i</a></li>";
			}
			else
			{
						echo"<li class='current'>$i</li>";
			}
	}
	if($current!=$page)
	{
			echo"<li><a href='?go=newcay&start=$next'>Next</a></li>";
	}
			
?></ul></div>
</form>