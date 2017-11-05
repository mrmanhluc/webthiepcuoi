<div id="cuslist1">
<form name="treelist" method="post">
<?
	$action = $_REQUEST['action'];
	$macay = $_REQUEST['macay'];
	$status = $_REQUEST['status'];
	switch($action)
	{
		case 'update' :
		{
			mysql_query("update cay set trangthaicay = '$status' where MaCay ='$macay'");
			break;
		}
		case 'del':
		{
			mysql_query("delete from cay where MaCay = '$macay'");
			break;
		}
	}
	$display=5;
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
			$sql3=mysql_query("select * from cay inner join  loaicay on cay.Maloai=loaicay.maloai order by MaCay desc limit $start,$display");
?>
<table width="100%" border="1" align="center" cellpadding="0" style="color:black">
    <tr class="rowtitle1">
      <td width="9%">Mã cây</td>
      <td width="20%">Hìnhảnh</td>
      <td width="12%">Tên cây</td>
      <td width="13%">Loại cây</td>
      <td width="15%">Giá bán</td>
      <td width="13%">Trạng thái</td>
      <td width="12%" colspan="2">&nbsp;</td>
    </tr>
<?
	while($row3=mysql_fetch_array($sql3)) {
?>   
    <tr class="row3" >
<td ><? echo ($row3['MaCay'])?></td>
      <td ><img src="../images/<? echo($row3['Hinhanh'])?>" width="150" height="180"/></td>
      <td ><? echo ($row3['TenCay'])?></td>
      <td ><? echo ($row3['TenLoai'])?></td>
      <td ><? echo (number_format($row3['Giaban']))?> VNĐ</td>
      <td><select name="status"  onchange="location.href='?go=prodlist1&start=<? echo $start?>&action=update&macay=<? echo($row3['MaCay']) ?>&status='+this.value">
        <? if($row3['TrangthaiCay']==1) { ?>
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
		<? }else{ ?>
        <option value="0">Ẩn</option>
        <option value="1">Hiện</option>
        <? } ?>
      </select></td>
      <td><a href="">Sửa</a></td>
      <?
	  	$a=$row4['MaCay'];
	  	$sql4=mysql_query("select MaCay from hondonct1 inner join hoadon on hoadon.MaHD=hondonct1.MaHD where MaCay='$a' and hoadon.TrangThaiHD!=3");
		if(mysql_num_rows($sql4)==0)
		 {
	  ?>
      <td><a href="?go=prodlist1&action=del&macay=<? echo($row4['MaCay'])?>">Xóa</a></td>
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
		echo"<li><a href='?go=prodlist1&start=$prev'>Pre</a></li>";
	}
	for($i=1; $i<=$page; $i++)
	{
		if($current !=$i)
			{
			echo"<li><a href='?go=prodlist1&start=".($display*($i-1))."'>$i</a></li>";
			}
			else
			{
						echo"<li class='current'>$i</li>";
			}
	}
	if($current!=$page)
	{
			echo"<li><a href='?go=prodlist1&start=$next'>Next</a></li>";
	}
			
?></ul></div>
</form>
</div>