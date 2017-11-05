
<script> 
	$(document).ready(function(){
        $('#frm_newtypetree').validate();

});  
</script>
<div id="newtypetree">
<form name="frm_newtypetree" id="frm_newtypetree" method="post">
<p>
	<label>Tên cây :</label>
    <input name="type" type="text" class="required"/>
</p>
	 <p class="login" style="margin-top:10px;">
    	<input type="submit" name="addcay" value="" style="background:url(../images/continue.gif);width:83px; height:26px" />
    </p>
    <?
		$addcay = $_REQUEST['addcay'];
		$type = $_REQUEST['type'];
		if(isset($addcay)){
			mysql_query("insert into loaicay(Tenloai) values ('$type')");
			if(mysql_num_rows(mysql_query("select Tenloai  from loaicay where Tenloai='$type'"))>0)
			{
				echo("<script>alert('Thêm loại cây thành công')</script>");
				echo("<script>window.location='?go=typetree'</script>");
			}else{
				echo ("<script>alert('Thêm loại cây tiền thất bại')</script>");
			}
		}
	?>
</form>
</div>