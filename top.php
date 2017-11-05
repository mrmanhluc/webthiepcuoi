
<script>
function checksearch(frmsearch)
{
	re=/^ *$/;
	if(re.test(frmsearch.txtSearch.value))
	{
		alert("Mời bạn nhận giá trị cần search");
		return false;
	}	
}
</script>
<div id="banner">
	<a href="?go=home"><img src="images/Top4.jpg" width="1004"></a>
</div>
<div id="divAdRight" style=" display: none; position: absolute; top: 0px">      
<a href="http://localhost/thiepcuoilee/index.php?go=home"><img src="images/BanerRight.gif" width="120"></a> 
</div>      
<div id="divAdLeft" style=" display: none; position: absolute; top: 0px">       
<a href="http://localhost/thiepcuoilee/index.php?go=home"><img src="images/BanerLeft.png" width="120"></a>       
</div>
<script>
    function FloatTopDiv()      
    {      
        startLX = ((document.body.clientWidth -MainContentW)/2)-LeftBannerW-LeftAdjust , startLY = TopAdjust+80;      
        startRX = ((document.body.clientWidth -MainContentW)/2)+MainContentW+RightAdjust , startRY = TopAdjust+80;      
        var d = document;      
        function ml(id)      
        {      
            var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];      
            el.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};      
            el.x = startRX;      
            el.y = startRY;      
            return el;      
        }      
        function m2(id)      
        {      
            var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];      
            e2.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};      
            e2.x = startLX;      
            e2.y = startLY;      
            return e2;      
        }      
        window.stayTopLeft=function()      
        {      
            if (document.documentElement && document.documentElement.scrollTop)      
                var pY =  document.documentElement.scrollTop;      
            else if (document.body)      
                var pY =  document.body.scrollTop;      
             if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else  {startLY = TopAdjust;startRY = TopAdjust;};      
            ftlObj.y += (pY+startRY-ftlObj.y)/16;      
            ftlObj.sP(ftlObj.x, ftlObj.y);      
            ftlObj2.y += (pY+startLY-ftlObj2.y)/16;      
            ftlObj2.sP(ftlObj2.x, ftlObj2.y);      
            setTimeout("stayTopLeft()", 1);      
        }      
        ftlObj = ml("divAdRight");      
        //stayTopLeft();      
        ftlObj2 = m2("divAdLeft");      
        stayTopLeft();      
    }      
    function ShowAdDiv()      
    {      
        var objAdDivRight = document.getElementById("divAdRight");      
        var objAdDivLeft = document.getElementById("divAdLeft");        
        if (document.body.clientWidth < 1005)      
        {      
            objAdDivRight.style.display = "none";      
            objAdDivLeft.style.display = "none";      
        }      
        else      
        {      
            objAdDivRight.style.display = "block";      
            objAdDivLeft.style.display = "block";      
            FloatTopDiv();      
        }      
    }
</script>
<script>           
$(document).write("<script type='text/javascript' language='javascript'>MainContentW = 1005;LeftBannerW = 120;RightBannerW = 120;LeftAdjust = 1;RightAdjust = 5;TopAdjust = 20;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>");    
</script>

