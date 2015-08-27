<?php 
require_once 'common/init.php';

$inventorty = new inventory();

if(isset($_GET['bc'])){
	$barcode = $_GET['bc'];
	
	$product = $inventorty->get_product($barcode);
	
	if ($product) {
			$_SESSION['barcode'] = $barcode;
			$_SESSION['barcode_detail'] = $product;
			print_f($_SESSION['barcode_detail']);
	}else{
		echo 'Error';
	} 
}