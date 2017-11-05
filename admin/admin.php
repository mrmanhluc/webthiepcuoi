<?
	session_start();
	if($_SESSION['admin'] == ""){
		echo"<script>window.location='login.php'</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="admin.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-1.3.2.min.js" ></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<title>ADMIN</title>
</head>
<?
	require('conn.php');
?>
<body>
	<div id="wapper">
    	<div id="top">
        	<div id="logout">
            	<p style="text-align:center; color:#666;font-size:16px;font-weight:bold;">Welcome</p>
            	<a href='?go=logout' onClick="if(confirm('Ban co chắc chắn muốn thoát'))return true; else return false;">Logout</a>
            </div>
            <div id="sologan">
            	<h2>Hệ thống quản lí Thiệp Cưới & Cây Tiền</h2>
            </div>
        </div>
        <div id="left">
        <p>Bài viết Giới thiệu</p>
            <ul>
            	<li><a href="?go=gioithieu">Thêm bài viết mới</a></li> 
                <li><a href="?go=prodlist2">Danh sách bài viết</a></li>               
            </ul>
        	<p>Quản lý loại Thiệp</p>
            <ul>
            	<li><a href="?go=typelist">Danh sách loại Thiệp</a></li>               
            </ul>
            <p>Quản lý loại Cây</p>
            <ul>
            	<li><a href="?go=typetree">Danh sách loại Cây</a></li>               
            </ul>
        	<p>Quản lý khách hàng</p>
            <ul>
            	<li><a href="?go=cuslist">Danh sách khách hàng</a></li>
            </ul>
             <p>Quản lý Thiệp</p>
            <ul>
            	<li><a href="?go=addthiep">Thêm Thiệp mới</a></li>
            	<li><a href="?go=prodlist">Danh sách đầu Thiệp</a></li>               
            </ul>
            <p>Quản lý Cây tiền</p>
            <ul>
            	<li><a href="?go=addcay">Thêm Cây tiền mới</a></li>
            	<li><a href="?go=prodlist1">Danh sách Cây tiền</a></li>               
            </ul>
             <p>Quản lý hóa đơn</p>
             <ul>
                
                <li><a href="?go=hd&status=1">Hóa đơn chưa xử lý</a></li>
                <li><a href="?go=hd&status=2">Hóa đơn đang xử lý</a></li>
                <li><a href="?go=hd&status=3">Hóa đơn đã xử lý</a></li>
               
             </ul>
        </div>
        <div id="main">
        	<?
				require('main.php');
			?>
        </div>
	</div>
</body>
</html>