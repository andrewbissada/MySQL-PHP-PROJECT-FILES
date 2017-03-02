<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="js/function.js"></script>
 </HEAD>

 <BODY>
 <?php include("config.php");?>
 <?php include("header.php");?>
 <?php
$page = $_REQUEST['p'];

switch($page){

		case 'home':
			include("home.php");
		break;
//INSURANCE
		case 'insurence':
		    include("viewinsurence.php");
		break;
		case 'add_insu':
		    include("addInsurence.php");
		break;
		case 'edit_insu':
		    include("addInsurence.php");
		break;


//HOMEADDRESS
		case 'users':
		    include("viewUsers.php");
		break;

		case 'add_users':
		    include("addUsers.php");
		break;
		case 'edit_users':
		    include("addUsers.php");
		break;

//Billing ADDRESS
		case 'billing':
		    include("viewBilling.php");
		break;

		case 'add_billing':
		    include("addBilling.php");
		break;
		case 'edit_billing':
		    include("addBilling.php");
		break;

//ITEMS
		case 'items':
		    include("viewItems.php");
		break;

		case 'add_items':
		    include("addItems.php");
		break;
		case 'edit_items':
		    include("addItems.php");
		break;
// OREDERS
		case 'orders':
		    include("viewOrders.php");
		break;

		case 'add_orders':
		    include("addOrders.php");
		break;
		case 'edit_orders':
		    include("addOrders.php");
		break;
// Personal Information
		case 'personalinfo':
		    include("viewPinfo.php");
		break;
		case 'add_pinfo':
		    include("addPinfo.php");
		break;
		case 'edit_pinfo':
		    include("addPinfo.php");
		break;
//Phone Number
		// Personal Information
		case 'phone':
		    include("viewPhone.php");
		break;
		case 'add_phone':
		    include("addPhone.php");
		break;
		case 'edit_phone':
		    include("addPhone.php");
		break;

//REVIEW
		// Personal Information
		case 'review':
		    include("viewReview.php");
		break;
		case 'add_review':
		    include("addReview.php");
		break;
		case 'edit_review':
		    include("addReview.php");
		break;

//SHIPPING PRICE

		//REVIEW
		// Personal Information
		case 'shiprc':
		    include("viewShiprc.php");
		break;
		case 'add_shiprc':
		    include("addShiprc.php");
		break;
		case 'edit_shiprc':
		    include("addShiprc.php");
		break;




		default :
			include("home.php");
		break;



}

 ?>
  

 </BODY>
</HTML>
