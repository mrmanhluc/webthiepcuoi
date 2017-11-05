<div id="type">
<form name="loaithiep" method="post">
<?
	$action=$_REQUEST['action'];
	$maloai=$_REQUEST['maloai'];
	$status=$_REQUEST['status'];
	switch($action)
	{
		case 'update':
		{
			mysql_query("UPDATE loaithiep SET trangthailoai ='$status' WHERE maloai ='$maloai'");
			break;
		}
		case 'del':
		{
			mysql_query("Delete from loaithiep where maloai = '$maloai'");
			break;
		}
	}
	$sql= mysql_query("select * from loaithiep");
?>

  <table width="75%" border="1" cellspacing="2" cellpadding="2" align="center">
    <tr class="rowtitle">
      <td width="15%">Mã loại</td>
      <td width="30%">Tên loại</td>
      <td width="20%">Trạng thái</td>
      <td width="10%">&nbsp;</td>
    </tr>
    <?
		while($row = mysql_fetch_array($sql)){
	?>
    <tr class="row">
    	<td><? echo $row['MaLoai']; ?></td>
        <td><? echo $row['TenLoai']?></td>
        <td><select name="status"  onchange="location.href='?go=typelist&action=update&maloai=<? echo($row['MaLoai'])?>&status='+this.value">
         <? if($row['TrangthaiLoai']==1) { ?> 
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
		<? }else { ?>
        <option value="0">Ẩn</option> 
        <option value="1">Hiện</option>
        <? }?>
        </select></td>
    <?
	  	$sql1=mysql_query('select maloai from thiep where maloai='.$row["MaLoai"].'');
		if(mysql_num_rows($sql1)==0){
	  ?>
      <td><a href="?go=typelist&action=del&maloai=<? echo ($row['MaLoai'])?>">Xóa</a> </td>
      <?  }else{ ?>
      <td><font color="#666666">Xóa</font></td> <? } ?>
      </tr>
    <?
		}
	?>
</table>
<p style="margin-top:20px;">Bạn có muốn thêm loại thiệp mới, chọn <a href="?go=newtype">đây</a></p>
 </form>   
</div>