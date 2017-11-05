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
<script type="text/javascript" src="js/divad.js"></script>

</head>
<?
	require('conn.php');
?>
<body>
	<div id="wapper">
    	<div id="top">
        	<?
				require('top.php');
			?>
      </div>
    	<div id="content">
            <div id="nag">
            	<ul> 
                <li><a href="?go=home"><span class="hover">TRANG CHỦ</a></li>
                    <li><a href="?go=add"><span class="hover">GIỚI THIỆU</a></li>
                    <li><a href=""><span class="hover">THIIỆP CƯỚI</a>
                    <ul id="nagmenu" style="line-height: 1.2;">
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=1"><span class="hover">Thiệp cưới hiện đại</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=2"><span class="hover">Thiệp cưới lazer</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=3"><span class="hover">Thiệp cưới in kỹ thuật số</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=4"><span class="hover">Thiệp cưới offet</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=5"><span class="hover">Thiệp cưới in thủ công</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=6"><span class="hover">Thiệp cưới ấn tượng</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=7"><span class="hover">Thiệp cưới cao cấp</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist&maloai=8"><span class="hover">Thiệp cưới mỹ thuật</span></a></li>
                    </ul>
                    </li>
                    <li><a href="?go=cart"><span class="hover">CÂY TIỀN THẬT</a>
                    <ul id="nagmenu1">
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist1&maloai=1"><span class="hover">Cây tiền tài lộc</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist1&maloai=2"><span class="hover">Cây tiền thật</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist1&maloai=3"><span class="hover">Phụ kiện cây tiền</span></a></li>
                    <li><a href="http://localhost/thiepcuoilee/index.php?go=prolist1&maloai=4"><span class="hover">Quà tặng tết</span></a></li>
                    </ul>
                    </li>
                    <li><a href="?go=cart"><span class="hover">TIN TỨC</a></li>
                     <li><a href="?go=hotline"><span class="hover">LIÊN HỆ</a></li>
                     <div class="search">
	<form method="post" name="frmsearch" onsubmit="return checksearch(this)">
    	<input type="text" name="txtSearch" value="Tìm kiếm" onfocus="this.value = '';" style="width:120px; height:20px; margin-top: 11px">
        <input type="submit" value=" " name="btnSearch" style="background-image:url(images/icon_search.png);width:30px; height:23px; margin-top: 13px;">
        <?
			if(isset($btnSearch)){
				$s = $_REQUEST['txtSearch'];
				echo ("<script>window.location='?go=search&tenthiep=$s'</script>");
			}
		?>
    </form>
    </div>
                
            </div>
            <div id="info">
            	<div id="left">
                	 <?
						require('left.php');
					?>
                </div>
                
                <div id="main">
                	<?
						require('main.php');
					?>  
                </div>
                 <div class="adfloat" id="divBannerFloatLeft" style="margin-top: -170px;">
 <p><a href="http://localhost/thiepcuoilee/index.php?go=home"><img src="images/BanerLeft.gif" alt=""></a>
 </p>
</div>
<div class="adfloat" id="divBannerFloatRight" style="margin-top: -170px;">
 <p><a href="http://localhost/thiepcuoilee/index.php?go=home"><img src="images/BanerRight.gif" alt=""></a>
 </p>
</div> 
                </div>
            </div>
   		</div>
    </div>
    
</body>
</html>