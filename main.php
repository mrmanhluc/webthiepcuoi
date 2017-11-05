<?
	$go = $_REQUEST['go'];
	switch($go){
		case 'home' :
		{
			require('home.php');
			break;
		}
		case 'login':
		{
			require('login.php');
			break;
		}
		case 'logout':
		{
			require('logout.php');
			break;
		}
		case 'registry':
		{
			require('registry.php');
			break;
		}
		case 'newthiep':
		{
			require('newthiep.php');
			break;
		}
		case 'newcay':
		{
			require('newcay.php');
			break;
		}
		case 'topthiep':
		{
			require('topthiep.php');
			break;
		}
		case 'topcay':
		{
			require('topcay.php');
			break;
		}
		case 'info':
		{
			require('info.php');
			break;
		}
		case 'change':
		{
			require('change.php');
			break;
		}
		case 'prolist':
		{
			require('prod_list.php');
			break;
		}
		case 'prolist1':
		{
			require('prod_list1.php');
			break;
		}
		case 'prolist01':
		{
			require('prod_list01.php');
			break;
		}
		case 'prodetail':
		{
			require('detail.php');
			break;
		}
		case 'prodetail1':
		{
			require('detail1.php');
			break;
		}
		case 'search':
		{
			require('search.php');
			break;
		}
		case 'cart':
		{
			require('cart.php');
			break;
		}
		case 'cart1':
		{
			require('cart1.php');
			break;
		}
		case 'cartsend':
		{
			require('cartsend.php');
			break;
		}
		case 'cartsend1':
		{
			require('cartsend1.php');
			break;
		}		case 'cart_login':
		{
			require('cart_login.php');
			break;
		}
		case 'success':
		{
			require('success.php');
			break;
		}
		case 'divad';
		{
			require('divad.php');
			break;
		}
		case 'map';
		{
			require('map.php');
			break;
		}
		case 'hotline';
		{
			require('hotline.php');
			break;
		}
		default:
		{
			require('home.php');
			break;
		}
	} 
	
?>