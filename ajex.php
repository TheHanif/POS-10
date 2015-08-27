<?php 
require_once 'common/init.php';
$terminallist = new terminal();
$product = new product();
$warehouse = new warehouse();


// Terminal Remove Latest Scan Session Function
if(isset($_POST['action']) && $_POST['action'] == 'removelatestscan'){
	unset($_SESSION['barcode']);
	unset($_SESSION['barcode_detail']);
	return 'sucess';
}

// Terminal Edit Function
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
	$itemqty		= $_POST['itemqty'];
	$arrayDelete 	= $_POST['rowarray'];
	$terminallist->update_qty_item($itemqty, $arrayDelete);
	return 'sucess';
}

// Terminal Delete Function
if(isset($_GET['delete'])){
	$product_id		= $_GET['delete'];
	$terminallist->delete_item_list($product_id);
	return 'sucess';
}

// Terminal Add Function
if(isset($_POST['action']) && $_POST['action'] == 'add'){
	$product_qty	= $_POST['latestqty'];
	$terminallist->add_item_list($product_qty);
	return 'sucess';
}

// Get Single Product Detail for Add Product in Warehouse Page
if(isset($_POST['action']) && $_POST['action'] == 'getproductdetail'){
	$getproduct		= $_POST['getproduct'];
	header('Content-Type: application/json');
	echo json_encode($product->get_product($getproduct));
}


// Get Single Product Detail for Add Product in Inventory Page
if(isset($_POST['action']) && $_POST['action'] == 'getwarehouseproductdetail'){
	$getproduct		= $_POST['getproduct'];
	header('Content-Type: application/json');
	echo json_encode($warehouse->get_products_detail($getproduct));
}

?>