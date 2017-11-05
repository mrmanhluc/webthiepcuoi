$(document).ready(function() {
	var stt = 0;
	starImg = $("img.slide1:first").attr("stt");
	endImg = $("img.slide1:last").attr("stt");
	$("img.slide1").each(function(){
		if($(this).is(':visible'))
		stt = $(this).attr("stt");  
    });
	$("#next1").click(function(){
		if(stt == endImg){
			stt = -1;
			}
		next1 = ++stt;
		$("img.slide1").hide();
		$("img.slide1").eq(next1).show();
		});
    $("#prev1").click(function(){
		if(stt == 0){
			stt = endImg;
			prev1 = stt++;
			}
		prev1 = --stt;
		$("img.slide1").hide();
		$("img.slide1").eq(prev1).show();
		});
		setInterval(function(){
			$("#next1").click();
		},8000);
});// JavaScript Document