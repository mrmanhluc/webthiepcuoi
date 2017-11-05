<script> 
	$(document).ready(function(){
        $('#frm_addcay').validate();

});  

</script>
<div id="addcay">
<form name="frm_addcay" id="frm_addcay" method="post" enctype="multipart/form-data">
<p><label>Tên cây: </label> <input type="text" name="tree" class="required" value="<? echo $tree?>"/></p>
<p><label>Giá bán:(VND) </label><input type="text" name="price" class="required number" value="<? echo $price?>"/></p>
<p><label>Mô tả:</label><textarea name="mota" class="required"/></textarea>
</p>
<p><label>Loại cây: </label> <select name="loaicay" id="loaicay" class="required">
    <option selected="selected">Chọn loại cây</option>
    <? $loaicay=mysql_query('select * from loaicay where TrangThaiLoai=1');
		while ($row=mysql_fetch_array($loaicay)){ ?>
    <option value="<? echo ($row['MaLoai']);?>"> <? echo ($row['TenLoai']); ?>  </option>
 <? } ?>
  </select></p>
<p><label>Hình ảnh:</label>
<input name="btnupload" type="submit" value="Upload"  onclick="return fhinhanhthem();" disabled="disabled">
<input name="f1" type="file" id="f1" onchange="frm_addcay.btnupload.disabled=false;"  ></p>
<p style="width:150px; height:180px; border:1px solid black; margin-left:20%;">
<?
	$data="../images/";
	$max_size="10000000";
	$max_file="1";
	$file_name=time().'_';
	if(isset($btnupload))
	{
		$tree = $_REQUEST['tree'];
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

<p><input type="submit" value="" name="addcay" style="background:url(../images/continue.gif);width:83px; height:26px" /></p>
<?
	if(isset($addcay)){
		$tree = $_REQUEST['tree'];
		$price = $_REQUEST['price'];
		$mota = $_REQUEST['mota'];
		$loaicay = $_REQUEST['loaicay'];
		$hinhanh = $_REQUEST['hinhanh'];
		if(mysql_num_rows(mysql_query("select * from cay where Tencay = '$tree'")) >0){
			echo("<script>alert Sản phẩm đã tồn tại, mời bạn chọn sản phẩm khác</script>");
		}else{
			mysql_query("insert into cay(Tencay,mota,hinhanh,giaban,maloai) values ('$tree','$mota','$hinhanh','$price','$loaicay')");
			if(mysql_affected_rows()>0)
			{
				$tree = "";
				$price = "";
				echo"<script>if(!confirm('Thêm sản phẩm thành công. Bạn có muốn thêm sản phẩm nữa không?')) location='?go=addcay';</script>";
			}
		}
	}
?>
</form>
</div>