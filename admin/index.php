<div id="index">
<?
	$sql = mysql_query(" SELECT count( mahd ) FROM hoadon WHERE trangthaihd =1 ");
	$chuaxl = mysql_fetch_array($sql);
	echo "<p>Hiện tại có $chuaxl[0] <a href='?go=hd&status=1'> hóa đơn chưa xử lý </a></p>";
	$sql2 = mysql_query(" SELECT count( mahd ) FROM hoadon WHERE trangthaihd =2 ");
	$dangxl = mysql_fetch_array($sql2);
	echo "<p>Hiện tại có $dangxl[0] <a href='?go=hd&status=2'> hóa đơn chưa xử lý </a></p>";
?>
</div>