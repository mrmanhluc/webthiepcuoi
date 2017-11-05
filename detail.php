<form name="detail" method="post">
<?
	$MaThiep=$_REQUEST['mathiep'];
	$sql=mysql_query("select * from thiep inner join loaithiep on thiep.maloai=loaithiep.maloai where MaThiep='$MaThiep'");
	$row=mysql_fetch_array($sql);
?>
<div id="detail">
<img src="images/<? echo $row['Hinhanh'] ?>">
<p>Tên thiệp : <? echo $row['TenThiep'] ?></p>
<p>Loại thiệp : <? echo $row['TenLoai'] ?></p>
<p>Giá bán : <span class="red"><i><? echo $row['Giaban'] ?> VNĐ</i></span></p>
<p>Mô tả: <? echo $row['MoTa'] ?></p>
<input type="button" value="" name="add" style="background:url(images/addtocart.gif); height:27px; width:93px;"  onclick="window.location.href='?go=cart&action=add&mathiep=<? echo ($row['MaThiep']);?>'">
</div><!--end ChitietSP-->
</form>