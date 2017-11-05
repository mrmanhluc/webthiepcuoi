<div id="cuslist">
<form name="thieplist" method="post">
<?
	$action = $_REQUEST['action'];
	$mathiep = $_REQUEST['mathiep'];
	$status = $_REQUEST['status'];
	switch($action)
	{
		case 'update' :
		{
			mysql_query("update thiep set trangthaithiep = '$status' where MaThiep ='$mathiep'");
			break;
		}
		case 'del':
		{
			mysql_query("delete from thiep where MaThiep = '$mathiep'");
			break;
		}
	}
	$display=5;
		if(isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
			$page=$_REQUEST['page'];
		}else{
			$res=mysql_query('select count(MaThiep) from thiep');
			$pt=mysql_fetch_array($res);
			$record=$pt[0];
			if($record>$display){
				$page=ceil($record/$display);
			}else{
				$page=1;
			}
		}
			$start= (isset($_REQUEST['start']) && (int)$_REQUEST['start']) ? $_REQUEST['start'] : 0; 
			$sql1=mysql_query("select * from thiep inner join  loaithiep on thiep.Maloai=loaithiep.maloai order by MaThiep desc limit $start,$display");
?>
<table width="100%" border="1" align="center" cellpadding="0" style="color:black">
    <tr class="rowtitle">
      <td width="9%">Mã thiệp</td>
      <td width="20%">Hình ảnh</td>
      <td width="12%">Tên thiệp</td>
      <td width="13%">Loại thiệp</td>
      <td width="15%">Giá bán</td>
      <td width="13%">Trạng thái</td>
      <td width="12%" colspan="2">&nbsp;</td>
    </tr>
<?
	while($row=mysql_fetch_array($sql1)) {
?>   
    <tr class="row" >
<td ><? echo ($row['MaThiep'])?></td>
      <td ><img src="../images/<? echo($row['Hinhanh'])?>" width="150" height="180"/></td>
      <td ><? echo ($row['TenThiep'])?></td>
      <td ><? echo ($row['TenLoai'])?></td>
      <td ><? echo (number_format($row['Giaban']))?> VNĐ</td>
      <td><select name="status"  onchange="location.href='?go=prodlist&start=<? echo $start?>&action=update&mathiep=<? echo($row['MaThiep']) ?>&status='+this.value">
        <? if($row['TrangthaiThiep']==1) { ?>
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
		<? }else{ ?>
        <option value="0">Ẩn</option>
        <option value="1">Hiện</option>
        <? } ?>
      </select></td>
      <td><a href="?go=editSP&MaThiep=<? echo($row['MaThiep'])?>">Sửa</a></td>
      <?
	  	$a=$row['MaThiep'];
	  	$sql2=mysql_query("select MaThiep from hondonct inner join hoadon on hoadon.MaHD=hondonct.MaHD where MaThiep='$a' and hoadon.TrangThaiHD!=3");
		if(mysql_num_rows($sql2)==0) 
		{
	  ?>
      <td><a href="?go=prodlist&action=del&mathiep=<? echo($row['MaThiep'])?>">Xóa</a></td>
      <? }else{ ?>
      <td><font color="#666666">Xóa</font></td><? } ?>
    </tr>
    <?
		}
	  ?>
  </table>
  <div id="phantrang">
  <ul>
<?
	if($page>1)
	$next = $start + $display;
	$prev = $start - $display;
	$current = ($start/$display) + 1 ;
	if($current!=1)
	{
		echo"<li><a href='?go=prodlist&start=$prev'>Pre</a></li>";
	}
	for($i=1; $i<=$page; $i++)
	{
		if($current !=$i)
			{
			echo"<li><a href='?go=prodlist&start=".($display*($i-1))."'>$i</a></li>";
			}
			else
			{
						echo"<li class='current'>$i</li>";
			}
	}
	if($current!=$page)
	{
			echo"<li><a href='?go=prodlist&start=$next'>Next</a></li>";
	}
			
?></ul></div>
</form>
</div>