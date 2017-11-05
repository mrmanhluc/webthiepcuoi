<script> 
	$(document).ready(function(){
        $('#frm_gioithieu').validate();

});  

</script>
<div id="gioithieu">
<form name="frm_gioithieu" id="frm_gioithieu" method="post" enctype="multipart/form-data">
<p><label>Tiêu đề bài viết:</label><textarea name="tieude" class="required"/></textarea></p>
<p><label>Nội dung bài viết:</label><textarea name="noidung" class="required"/></textarea>
</p>
<p><label>Hình ảnh:</label>
<input name="btnupload" type="submit" value="Upload"  onclick="return fhinhanhthem();" disabled="disabled">
<input name="f1" type="file" id="f1" onchange="frm_add.btnupload.disabled=false;"  ></p>
<p style="width:150px; height:180px; border:1px solid black; margin-left:20%;">
<?
	$data="../images/";
	$max_size="10000000";
	$max_file="5";
	$file_name=time().'_';
	if(isset($btnupload))
	{
		$noidung = $_REQUEST['noidung'];
		
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
	if(isset($gioithieu)){
		$noidung = $_REQUEST['noidung'];
		$hinhanh = $_REQUEST['hinhanh'];
		mysql_query("insert into thiep(noidung,hinhanh) values ('$noidung','$hinhanh')");
			if(mysql_affected_rows()>0)
			{
				echo"<script>if(!confirm('Thêm bài viết thành công. Bạn có muốn thêm bài viết nữa không?')) location='?go=gioithieu';</script>";
			}
		}
?>
</form>
</div>