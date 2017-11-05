<script> 
	$(document).ready(function(){
        $('#frm_add').validate();

});  

</script>
<div id="add">
<form name="frm_add" id="frm_add" method="post" enctype="multipart/form-data">
<p><label>Tên thiệp: </label> <input type="text" name="thiep" class="required" value="<? echo $thiep?>"/></p>
<p><label>Giá bán:(VND) </label><input type="text" name="price" class="required number" value="<? echo $price?>"/></p>
<p><label>Mô tả:</label><textarea name="mota" class="required"/></textarea>
</p>
<p><label>Loại thiệp: </label> <select name="loaithiep" id="loaithiep" class="required">
    <option selected="selected">Chọn loại thiệp</option>
    <? $loaithiep=mysql_query('select * from loaithiep where TrangThaiLoai>=1');
		while ($row=mysql_fetch_array($loaithiep)){ ?>
    <option value="<? echo ($row['MaLoai']);?>"> <? echo ($row['TenLoai']); ?>  </option>
 <? } ?>
  </select></p>
<p><label>Hình ảnh:</label>
<input name="btnupload" type="submit" value="Upload"  onclick="return fhinhanhthem();" disabled="disabled">
<input name="f1" type="file" id="f1" onchange="frm_add.btnupload.disabled=false;"  ></p>
<p style="width:150px; height:180px; border:1px solid black; margin-left:20%;">
<?
	$data="../images/";
	$max_size="10000000";
	$max_file="1";
	$file_name=time().'_';
	if(isset($btnupload))
	{
		$thiep = $_REQUEST['thiep'];
		$price = $_REQUEST['price'];
		$mota = $_REQUEST['mota'];
		
		$a=$_FILES["f1"]["tmp_name"]; 
		$b=$_FILES["f1"]["name"];
		$d=$_FILES["f1"]["size"];
		$c=substr($b,strlen($b)-3,3);
	
			if($d>$max_size)
			{
				echo("<script>alert('Kich thuoc anh khong phu hop');</script>");
			}
			else
			{
				if($c=="jpg" || $c=="jpeg" ||$c=="gif" || $c=="bmp" || $c=="png" || $c=="JPG" || $c=="JPEG" || $c=="GIF" || $c=="BMP"||$c=="PNG")
				{
			
					$tenfile=$file_name.$b;
					move_uploaded_file($a,$data.$tenfile);
					?>
                   
					<img src="<?=$data.$tenfile ?>" width="150" height="180"  />
                   
                    <?
				}
			}
		
	}
	
?></p>
<input type="hidden" name="hinhanh" value="<?=$tenfile ?>" />

<p><input type="submit" value="" name="add" style="background:url(../images/continue.gif);width:83px; height:26px" /></p>
<?
	if(isset($add)){
		$thiep = $_REQUEST['thiep'];
		$price = $_REQUEST['price'];
		$mota = $_REQUEST['mota'];
		$loaithiep = $_REQUEST['loaithiep'];
		$hinhanh = $_REQUEST['hinhanh'];
		if(mysql_num_rows(mysql_query("select * from thiep where Tenthiep = '$thiep'")) >0){
			echo("<script>alert Sản phẩm đã tồn tại, mời bạn chọn sản phẩm khác</script>");
		}else{
			mysql_query("insert into thiep(Tenthiep,mota,hinhanh,giaban,maloai) values ('$thiep','$mota','$hinhanh','$price','$loaithiep')");
			if(mysql_affected_rows()>0)
			{
				$thiep = "";
				$price = "";
				echo"<script>if(!confirm('Thêm sản phẩm thành công. Bạn có muốn thêm sản phẩm nữa không?')) location='?go=addthiep';</script>";
			}
		}
	}
?>
</form>
</div>