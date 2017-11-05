<?
	$go=$_REQUEST['go'];
	switch($go){
		case 'typelist':
		{
			require('type.php');
			break;
		}
		case 'typetree':
		{
			require('typetree.php');
			break;
		}
		case 'detail':
		{
			require('detail.php');
			break;
		}
		case 'detail1':
		{
			require('detail1.php');
			break;
		}
		case 'newtype':
		{
			require('newtype.php');
			break;
		}
		case 'newtypetree':
		{
			require('newtypetree.php');
			break;
		}
		case 'hd':
		{
			require('hd.php');
			break;
		}
		case 'hd1':
		{
			require('hd1.php');
			break;
		}
		case 'logout' :
		{
			require('logout.php');
			break;
		}
		case 'cuslist':
		{
			require('cus.php');
			break;
		}
		case 'cuslist1':
		{
			require('cus1.php');
			break;
		}
		case 'gioithieu':
		{
			require('gioithieu.php');
			break;
		}
		case 'addthiep':
		{
			require('add.php');
			break;
		}
		case 'addcay':
		{
			require('addcay.php');
			break;
		}
		case 'index':
		{
			require('index.php');
			break;
		}
		case 'prodlist':
		{
			require('thieplist.php');
			break;
		}
		case 'prodlist1':
		{
			require('treelist.php');
			break;
		}
		default:
		{
			require('index.php');
			break;
		}
	}
?>