<?php 
require_once 'common/init.php';

if (!isset($_SESSION['terminal_list'])) {
	$_SESSION['terminal_list'] = array();
}


if(isset($_POST['latestqty'])){
	$_SESSION['barcode_detail']['quantity'] = $_POST['latestqty'];
	// Add new scan Session with update quantity
	$latest_product_add_detail = array ( $_SESSION['barcode'] => $_SESSION['barcode_detail'] );

	// Complete Scan Terminal List
	$_SESSION['terminal_list'][] = $latest_product_add_detail;

	$count = count($_SESSION['terminal_list']);
	$price 	= $_SESSION['barcode_detail']['price'];
	$qty 	= $_SESSION['barcode_detail']['quantity'];
	$price1 = number_format((float)$price, 2, '.', '');
	$total 	= $price * $qty; 
	$total1 = number_format((float)$total, 2, '.', '');
	$id = end(array_keys($_SESSION['terminal_list']));

	echo '<li class="col-md-12 nopadding product_list">
		<div class="product" id="row_'.($count).'">
		    <div class="col-md-1 nopadding alignCenter">'.($count+1).'</div>
		    <div class="col-md-5 ">'. $_SESSION['barcode_detail']['name'] .'<a class="itemDelete" href="terminal_list.php?product_id='. $id .'" style="color:#fff;"><span class="glyphicon glyphicon-trash floatRight" aria-hidden="true"></span></a><input type="hidden" class="rowdelete" value="'. $id .'"/></div>
		    <div class="col-md-2 alignRight paddingright30 productPrice">'. $price1 .'</div>
		    <div class="col-md-2 alignCenter"><lable>'. $qty .'</lable></div>
		    <div class="col-md-2 alignRight paddingright30"><span class="subtotalAmtSpan">'. $total1.'</span><input type="hidden" class="subtotalAmt" value="'. $total1.'" /></div>
		    <div class="clearfix"></div>
		</div>
		<div class="productoffer">
			<div class="col-md-5 col-md-offset-1">Free Pencil</div>
		    <div class="col-md-6 nopadding"></div>
		    <div class="clearfix"></div>
		</div>
	</li>';
}

// Delete Product for Terminal List Item (Delete Button Function)
if(isset($_GET['product_id'])){
	unset($_SESSION['terminal_list'][$_GET['product_id']]);
	echo 'sucess';
}


// Update Quantity for Select Item (Edit or Change Button Function)
if(isset($_POST['itemqty'])){
	echo $_POST['itemqty'];
	echo $_POST['rowarray'];
	foreach ($_SESSION['terminal_list'][$_POST['rowarray']] as $key => $value) {
		$_SESSION['terminal_list'][$_POST['rowarray']][$key]['quantity'] = $_POST['itemqty'];
	}
}

//print_f($_SESSION['terminal_list']);
?>