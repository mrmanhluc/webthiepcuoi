<form name="detail1" method="post">
<?
	$MaCay=$_REQUEST['macay'];
	$sql=mysql_query("select * from cay inner join loaicay on cay.maloai=loaicay.maloai where MaCay='$MaCay'");
	$row=mysql_fetch_array($sql);
?>
<div id="detail1">
<img src="images/<? echo $row['Hinhanh'] ?>">
<p>Tên cây : <? echo $row['TenThiep'] ?></p>
<p>Loại cây : <? echo $row['TenLoai'] ?></p>
<p>Giá bán : <span class="red"><i><? echo $row['Giaban'] ?> VNĐ</i></span></p>
<p>Mô tả: <? echo $row['MoTa'] ?></p>
<input type="button" value="" name="addcay" style="background:url(images/addtocart.gif); height:27px; width:93px;"  onclick="window.location.href='?go=cart1&action=addcay&macay=<? echo ($row['MaCay']);?>'">
</div><!--end ChitietSP-->
</form>