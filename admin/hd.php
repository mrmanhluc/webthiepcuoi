<div id="hd">
<form method="post" name="hd">
<?
	$action=$_REQUEST['action'];
	$trangthai=$_REQUEST['status'];
	$mahd=$_REQUEST['mahd'];
	switch($action)
	{
	case 'update':
	{
		mysql_query("update hoadon set TrangthaiHD='$status' where MaHD='$mahd'");
		break;
	}
	case 'del':
	{
		mysql_query("delete from hoadon where MaHD='$mahd'");
		break;
	}
	}
?>
<?
	$display=8;
	if(isset($_REQUEST['page']) && (int)$_REQUEST['page'])
	{
		$page=$_REQUEST['page'];
	}
	else
	{
		$res=mysql_query("select count(MaHD) from hoadon");
		$pt=mysql_fetch_array($res);
		$record=$pt[0];
		if($record>$display)
		{
			$page=ceil($record/$display);
		}
		else
		{
			$page=1;
		}
	}
	$start=(isset($_REQUEST['start']) && (int)$_REQUEST['start']) ? $_REQUEST['start'] : 0;
	
	$sql=mysql_query("select * from hoadon inner join hondonct on hoadon.MaHD=hondonct.MaHD  where TrangthaiHD=$trangthai group by hoadon.MaHD asc limit $start,$display"); 

?>
<table width="100%" border="1" cellpadding="3" cellspacing="3">
	<tr class=" rowtitle">
        <td width="16%">Mã hóa đơn</td>
        <td width="20%">Ngày lập hóa đơn</td>
        <td width="19%">Ngày giao hàng</td>
        <td width="17%">Tổng tiền</td>
        <td width="12%">Trạng thái</td>
        <td colspan="2">&nbsp;</td>
    </tr>
    <?
		while($row=mysql_fetch_array($sql)) {
	?>
 	<tr class="row">
    	<td><? echo ($row['MaHD']) ?></td>
        <td><? echo ($row['Ngaylap'])?></td>
        <td><? echo ($row['Ngaynhan'])?></td>
        <td><? echo number_format(($row['Tongtien']))?><font color="red"> VNĐ</font></td>
        <td>
        <select name="status" onChange="location.href='?go=hd&start=<? echo $start?>&action=update&mahd=<? echo($row['MaHD'])?>&status='+this.value">
      <?
	  	if($row['TrangthaiHD']==3)
		{
	  ?>  
		<option value="3">Đã xử lí</option>        
      <?
	  	}else{
		if($row['TrangthaiHD']==2){
	  ?>
		  <option value="2">Đang xử lí</option>
		  <option value="1">Chưa xử lí</option>
		  <option value="3">Đã xử lí</option>
		<?
		}else{
		?>
		  <option value="1">Chưa xử lí</option>
		  <option value="2">Đang xử lí</option>
		<?
		}}
		?>
	  </select>  
        </td>
        <td width="8%"><a href="?go=detail&mahd=<? echo ($row['MaHD'])?>">Chi tiết</a></td>
        <td width="8%"><? if($row['TrangthaiHD']==1) {?><a href="?go=hd&start=<? echo $start ?>&status=1&action=del&mahd=<? echo ($row['MaHD'])?>">Xóa</a>
        <? }else{ ?> <font color="#CCCCCC">Xóa</font> <? } ?></td>
    </tr>   
    <?
		}
	?>
</table>
<div id="phantrang">
	<ul>
    <?
	$next= $start + $display;
	$pre= $start - $display;
	$current= ($start/$display) + 1;
	if($current!=1)
	{
		echo"<li><a href='?go=hd&status=".$trangthai."&start=$pre'>Pre</a></li>";
	}
	for($i=1; $i<=$page; $i++)
	{
		if($current !=$i)
			{
			echo"<li><a href='?go=hd&status=".$trangthai."&start=".($display*($i-1))."'>$i</a></li>";
			}
			else
			{
						echo"<li class='current'>$i</li>";
			}
	}
	if($current!=$page)
	{
			echo"<li><a href='?go=hd&status=".$trangthai."&start=$next'>Next</a></li>";
	}
			
	?>
    </ul>
</div>
</form>

</div><!-- end #hd-->