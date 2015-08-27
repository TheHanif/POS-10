<?php 
require_once 'common/init.php';

$sales = new sales();

$form['bill_number'] = $bill_number;
$form['user_shift_number'] = $user_shift_number;
$form['user_terminal_point_number'] = $user_terminal_point_number;
$form['user_id'] = $_SESSION['user']->id;
$form['payment_mode'] = $_GET['payment_mode'];


// Sale Insert Disable for Main reason is first offers item and discounted prise final
// Report Print Section Completest
/*
$results = $sales->sale_insert($form);

if ($results) {
//	echo 'Sucess';
}else{
//	echo 'Error';
}
*/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Sale</title>
	<link href="assets/css/reset.css" rel="stylesheet">
	<link href="assets/css/general.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">

	<script type="text/javascript" src="assets/js/jquery.latest.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// Sub Total All Amount Table and save in subtotal variable
			var subtotal = 0;
		    $('.subtotalAmt').each(function() {
		        subtotal += parseInt($(this).val());
		    });
		    
		    var total = $("#subtotalAmount").text(parseFloat(subtotal).toFixed(2));
		    var cashbalance = $("#cashBalance").text();
		    var cashpaid = parseInt(cashbalance)+subtotal;
		    $("#cashPaid").text(parseFloat(cashpaid).toFixed(2));
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 alignCenter">
				<img src="assets/images/print_logo.png"/>
				<h4>Sale Reciept</h4>
			</div>
			<div class="col-md-6">
				<p><strong>Bill No: </strong><?php echo $bill_number ?></p>
			</div>
			<div class="col-md-6">
				<p><strong>Date &amp; Time: </strong><?php $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
 						echo $date->format("j-n-Y, g:i a"); ?></p>
			</div>
			<div class="col-md-12">
				<p><strong>Transaction: </strong><?php echo $_GET['payment_mode']; ?></p>
			</div>
			<div class="col-md-6">
				<p><strong>User: </strong><?php echo $_SESSION['user']->first_name; ?> <?php echo $_SESSION['user']->last_name; ?></p>
			</div>
			<div class="col-md-6">
				<p><strong>Counter: </strong><?php echo $user_terminal_point_number ?></p>
			</div>
		</div><!-- Head Coumplete -->
		
		<div class="row">
			<ul class="headingTable">
                <li class="col-md-5">Description</li>
                <li class="col-md-2 nopadding">Price</li>
                <li class="col-md-2 nopadding">Discount</li>
                <li class="col-md-1">Qty</li>
                <li class="col-md-2 nopadding noborderRight">Total</li>
                <div class="clearfix"></div>
        	</ul>
			<ul>
        	<?php 
	        	$subtotalamount = 0;
	        	if(isset($_SESSION['terminal_list'])){
					foreach ($_SESSION['terminal_list'] as $key => $value) {
						$barcode = key($value);
					?>
					<li class="col-md-12 nopadding product_list">
	                    <div class="product">
		                    <div class="col-md-5"><?php echo $value[$barcode]->p_name; ?><a class="itemDelete" href="terminal_list.php?product_id=<?php echo $key ?>" style="color:#fff;"><span class="glyphicon glyphicon-trash floatRight" aria-hidden="true"></span></a><input type="hidden" class="rowdelete" value="<?php echo $key ?>"/></div>
		                    <div class="col-md-2 alignCenter paddingright30 productPrice"><?php echo $price = number_format((float)$value[$barcode]->inv_price, 2, '.', '') ?></div>
		                    <div class="col-md-2 alignCenter paddingright30 productPrice">
							<?php
		                    	$discount_type = $value[$barcode]->discount_type;
		                    	if($discount_type == 'flat'){
		                    		echo $currency . $discount = $value[$barcode]->discount_amount;
		                    		$discount_product_amount = $discount;
		                    	}
		                    	else {
		                    		echo $discount = $value[$barcode]->discount_amount.'%';
		                    		$discount_product_amount = $price * ($discount/100); 
		                    	}
		                    ?>
		                    </div>
		                    <div class="col-md-1 alignCenter"><lable><?php echo $qty = $value[$barcode]->quantity; ?></lable></div>
		                    <div class="col-md-2 alignRight paddingright30"><span class="subtotalAmtSpan"><?php echo $subtotal = number_format(((float)$price-$discount_product_amount) * $qty, 2, '.', ''); ?></span><input type="hidden" class="subtotalAmt" value="<?php echo $subtotal; ?>" /></div>
		                    <div class="clearfix"></div>
	                	</div>
	                	<div class="productoffer">
	                		<div class="col-md-6">
	                			<?php if(isset($value[$barcode]->offer_products)){
		                				$free_products = $value[$barcode]->offer_products; 
			                			foreach ($free_products as $free_product) { ?>
			                				<div class="col-md-5 col-md-offset-1"><?php echo $free_product->offer_product_quantity .' - '. $free_product->p_name; ?></div>
				                    		<div class="col-md-6 nopadding"></div>
				                    		<div class="clearfix"></div>
			                    <?php
		                				}
		                			}
		                		?>
	                		</div>
		                    <div class="col-md-6 nopadding"></div>
		                    <div class="clearfix"></div>
	                	</div>
	            	</li><!-- One Product Close -->
					<?php
					$subtotalamount += $subtotal;
	            	}
	            } // Close If Session Line
	        	?>
	        </ul>
			<div class="col-md-12 marginTop subTotal">
					<ul>
						<li class="col-md-12">
							<div class="col-md-10 alignRight">Total: </div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="subtotalAmount">0</span></div>
						</li>
						<li class="col-md-12 bgdark">
							<div class="col-md-10 alignRight">Cash Paid: </div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="cashPaid">0</span></div>
						</li>
						<li class="col-md-12">
							<div class="col-md-10 alignRight">Cash Balance: </div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="cashBalance"><?php echo number_format((float)$_GET['amount'], 2, '.', ''); ?></span></div>
						</li>
					</ul>
			</div><!-- latestScan Close -->
		</div><!-- Table Complete -->
		<div class="row">
			<div class="col-md-12">
				<p class="alignCenter">Footer Detail</p>
			</div>
		</div>
	</div><!-- Container Close -->
</body>
</html>