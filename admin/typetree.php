<div id="typetree">
<form name="loaicay" method="post">
<?
	$action=$_REQUEST['action'];
	$maloai=$_REQUEST['maloai'];
	$status=$_REQUEST['status'];
	switch($action)
	{
		case 'update':
		{
			mysql_query("UPDATE loaicay SET trangthailoai ='$status' WHERE maloai ='$maloai'");
			break;
		}
		case 'del':
		{
			mysql_query("Delete from loaicay where maloai = '$maloai'");
			break;
		}
	}
	$sql= mysql_query("select * from loaicay");
?>

  <table width="75%" border="1" cellspacing="2" cellpadding="2" align="center">
    <tr class="rowtitle1">
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
        <td><select name="status"  onchange="location.href='?go=typetree&action=update&maloai=<? echo($row['MaLoai'])?>&status='+this.value">
         <? if($row['TrangthaiLoai']==1) { ?> 
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
		<? }else { ?>
        <option value="0">Ẩn</option> 
        <option value="1">Hiện</option>
        <? }?>
        </select></td>
    <?
	  	$sql1=mysql_query('select maloai from cay where maloai='.$row["MaLoai"].'');
		if(mysql_num_rows($sql1)==0){
	  ?>
       <td><a href="?go=typetree&action1=del&maloai=<? echo ($row['MaLoai'])?>">Xóa</a> </td>
      <?  }else{ ?>
      <td><font color="#666666">Xóa</font></td> <? } ?>
      </tr>
    <?
		}
	?>
</table>
<p style="margin-top:20px;">Bạn có muốn thêm loại cây mới, chọn <a href="?go=newtypetree">đây</a></p>
 </form>   
</div>