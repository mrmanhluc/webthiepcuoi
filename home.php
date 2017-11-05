<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css" />
<title>Thiệp Cưới Lee</title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/slider1.js"></script>

</head>
<div id="slider">
            <img class="slide" src="images/M24.jpg" width="380px" height="270px" stt="0"/>
            <img class="slide" src="images/M23.jpg" width="380px" height="270px" stt="1" style="display:none"/>
            <img class="slide" src="images/M22.jpg" width="380px" height="270px" stt="2" style="display:none"/>
            <a href="#" id="prev"><img src="images/prev.png" width="50px" height="50px"></a>
            <a href="#" id="next"><img src="images/next.png" width="50px" height="50px"></a>
    </div>
               <div id="slider1">
            <img class="slide1" src="images/M27.jpg" width="380px" height="270px" stt="0"/>
            <img class="slide1" src="images/M28.jpg" width="380px" height="270px" stt="1" style="display:none"/>
            <img class="slide1" src="images/M29.jpg" width="380px" height="270px" stt="2" style="display:none"/>
            <a href="#" id="prev1"><img src="images/prev1.png" width="50px" height="50px"></a>
            <a href="#" id="next1"><img src="images/next1.png" width="50px" height="50px"></a>
    </div>


<div id="subhome">
<p>
	  SẢN PHẨM THIỆP CƯỚI
</p>
</div>
<form name="list_prod" method="post">
<? 
	$display=6;
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
	$sql1=mysql_query("select * from thiep where TrangThaiThiep=1 LIMIT $start,$display");
	
	while($row=mysql_fetch_array($sql1)){
?>
<div id="prod">
<a href="?go=prodetail&mathiep=<? echo $row['MaThiep'] ?>"><img src="images/<? echo $row['Hinhanh'] ?>" /></a>
<p><a href="?go=prodetail&mathiep=<? echo $row['MaThiep'] ?>"><span class="a"><? echo $row['TenThiep'] ?></span></a></p>
<p style="color:red"><? echo number_format($row['Giaban']) ?> VNĐ</p>  

  
</div> 
<!--end # sanpham-->
  <?
	}
?></div>

</form>
