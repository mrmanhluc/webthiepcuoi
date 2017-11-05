
<script> 
	$(document).ready(function(){
        $('#frm_newtype').validate();

});  
</script>
<div id="newtype">
<form name="frm_newtype" id="frm_newtype" method="post">
<p>
	<label>Tên thiệp :</label>
    <input name="type" type="text" class="required"/>
</p>
	 <p class="login" style="margin-top:10px;">
    	<input type="submit" name="add" value="" style="background:url(../images/continue.gif);width:83px; height:26px" />
    </p>
    <?
		$add = $_REQUEST['add'];
		$type = $_REQUEST['type'];
		if(isset($add)){
			mysql_query("insert into loaithiep(Tenloai) values ('$type')");
			if(mysql_num_rows(mysql_query("select Tenloai  from loaithiep where Tenloai='$type'"))>0)
			{
				echo("<script>alert('Thêm loại thiệp thành công')</script>");
				echo("<script>window.location='?go=typelist'</script>");
			}else{
				echo ("<script>alert('Thêm loại thiệp thất bại')</script>");
			}
		}
	?>
</form>
</div>