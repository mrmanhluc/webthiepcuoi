<?
	$mahd=$_REQUEST['mahd'];
	$sql=mysql_query("select * from khachhang inner join hoadon on khachhang.MaKH=hoadon.MaKH inner join hondonct on hoadon.MaHD=hondonct.MaHD where hoadon.MaHD='$mahd'");
	$row=mysql_fetch_array($sql)
?>
<div id="hondonct">
<div id="thongtinhd">
<h4>Thông tin hóa đơn</h4>
<p style="float:left"><label>Mã hóa đơn :</label>&nbsp;<span><? echo ($row['MaHD'])?></span> </p>
<p style="float:left"><label>Ngày lập hóa đơn: </label>&nbsp;<span><? echo ($row['Ngaylap'])?></span> </p>
<p style="float:left"><label>Ngày giao hàng: </label>&nbsp;<span><? echo ($row['Ngaynhan'])?></span> </p>
<p style="float:left"><label>Trạng thái: </label>&nbsp;<span><? if(($row['TrangthaiHD'])== 1) echo('Chưa xử lý');if(($row['TrangthaiHD'])==2) echo ('Đang xử lý'); if(($row['TrangthaiHD'])==3) echo('Đã xử lý');?></span> </p>

</div>
<div id="thongtinkh">
<h4>Thông tin người nhận</h4>
<p style="float:left"><label>Tên người nhân: </label>&nbsp;<span><? echo ($row['Nguoinhan'])?></span> </p>
<p style="float:left"><label>Địa chỉ giao hàng: </label>&nbsp;<span><? echo ($row['DiachiNN'])?></span> </p>
<p style="float:left"><label>Số điện thoại người nhận :</label>&nbsp;<span><? echo ($row['SoDT'])?></span> </p>
</div>
<div id="thongtintk">
<h4>Thông tin tài khoản</h4>
<p style="float:left"><label>Tên khách hàng: </label>&nbsp;<span><? echo ($row['TenKH'])?></span> </p>
<p style="float:left"><label>Email: </label>&nbsp;<span><? echo ($row['Email'])?></span> </p>
<p style="float:left"><label>Số điện thoại : </label>&nbsp;<span><? echo ($row['SoDT'])?></span> </p>
<p style="float:left"><label>Địa chỉ: </label>&nbsp;<span><? echo ($row['Diachi'])?></span> </p>
</div>

<div id="thongtinsp">
<table border="1" width="100%">
	<tr class="rowtitle">
    	<td>STT</td>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Giá bán</td>
        <td>Số lượng</td>
        <td>Tổng tiền</td>
	</tr>
    <?
		$sql1=mysql_query("select * from cay inner join  hondonct on cay.MaCay=hondonct.MaCay where hondonct.MaHD='$mahd'");
		$stt=0;
		
		while($r=mysql_fetch_array($sql1)) {
		$stt++;
	?>
    <tr class="row">
    	<td><? echo $stt ?></td>
        <td><? echo ($r['MaCay'])?></td>
        <td><? echo ($r['TenCay'])?></td>
        <td><? echo number_format($r['Giaban']) ?> VNĐ</td>
        <td><? echo ($r['Soluong'])?></td>
        <? $a= $r['Giaban'] *$r['Soluong'];
			$b=$r['Tongtien'];?>
        <td><? echo number_format($a) ?> VNĐ</td>
    </tr>
    <?
		}
	?>
    <tr>
      <td colspan="5" align="right" valign="middle" class="row">Total : </td>
      <td align="center" class="row">&nbsp;<?php echo(number_format($b));?> VNĐ</td>
    </tr>
</table>
</div>
</div>
