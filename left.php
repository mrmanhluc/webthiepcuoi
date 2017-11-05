<div id="border">
<p>
	  THIỆP CƯỚI
</p>
<? 
	$sql_left = mysql_query('select * from loaithiep where TrangthaiLoai>=1');
	while($row = mysql_fetch_array($sql_left)) {
?>
<ul>
	<li><a href="?go=prolist&maloai=<? echo $row['MaLoai']?>"><? echo ($row['TenLoai']) ?></a></li>
</ul>
<?
	}
?>
</div>
<div id="border">
<p>
	  CÂY TIỀN THẬT
</p>
<? 
	$sql_left = mysql_query('select * from loaicay where trangthailoai = 1');
	while($row = mysql_fetch_array($sql_left)) {
?>
<ul>
	<li><a href="?go=prolist1&maloai=<? echo $row['MaLoai']?>"><? echo ($row['TenLoai']) ?></a></li>
</ul>
<?
	}
?>
</div>
<div id="border">
<p>
	  LIÊN HỆ
</p>
<ul>
	<li><a href="?go=hotline">Hotline</a></li>
    <li><a href="#">Facebook</a></li>
    <li><a href="?go=map">Site map</a></li>
</ul>
</div>
<div id="img"></div>