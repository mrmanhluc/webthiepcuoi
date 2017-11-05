<div id="cuslist">
	<form name="cus" method="post">
    <?
		$action = $_REQUEST['action'];
		$status = $_REQUEST['status'];
		$makh = $_REQUEST['makh'];
		switch($action)
		{
			case 'update':
			{
				mysql_query("update khachhang set TrangthaiKH = '$status' where makh = '$makh'");
				break;
			}
			case 'del':
			{
				mysql_query("delete from khachhang where makh = '$makh'");
				break;
			}
		}
		$sql = mysql_query("select * from khachhang");
	?>
    <table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr class="rowtitle">
    <td width="5%">Mã khách hàng</td>
    <td width="20%">Email</td>
    <td width="15%">Tên khách hàng</td>
    <td width="10%">Số điện thoại</td>
    <td width="5%">Giới tính</td>
    <td width="20%">Địa chỉ</td>
    <td width="5%">Trạng thái</td>
    <td width="5%">&nbsp;</td>
  </tr>
  <?
  	while ($row = mysql_fetch_array($sql)) {
  ?>
  <tr class="row">
    <td><? echo ($row['MaKH'])?></td>
    <td><? echo ($row['Email'])?></td>
    <td><? echo ($row['TenKH'])?></td>
    <td><? echo ($row['SoDT'])?></td>
    <td><? if($row['Gioitinh']==1) { echo"Nam"; }else{ echo "Nữ" ;}  ?></td>
    <td><? echo($row['Diachi'])?></td>
    <td>
      <select name="status"  onchange="location.href='?go=cuslist&action=update&makh=<? echo ($row['MaKH']) ?>&status='+this.value">
        <? if($row['TrangthaiKH']==1){ ?>
		<option value="1">Hiện</option>
        <option value="0">Ẩn</option>
		<? }else{?>
        <option value="0">Ẩn</option>
        <option value="1">Hiện</option>
	<?	} ?>
      </select></td>
      <?
	  $sql1=mysql_query('select MaKH from hoadon where MaKH='.$row["MaKH"].'');
	  if(mysql_num_rows($sql1)==0) {
	  ?>
    <td><a href="?go=cuslist&action=del&makh=<? echo ($row['MaKH'])?>">Xóa</a></td>
    <? }else{ ?>
    <td><font color="#666666">Xóa</font></td> <? } ?>
  </tr>
  <?
	}
  ?>
    </form>
</div>