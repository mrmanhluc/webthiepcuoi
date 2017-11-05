<?
	$connect=mysql_connect("localhost","root","root");
	if(!$connect)
		die("Could not connect..". mysql_error());
	else
	{
		mysql_select_db('thiepcuoilee',$connect);
		mysql_query("SET NAMES 'UTF8'",$connect);
	}
?>