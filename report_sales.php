<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$accounts = new accounts();
			// Get Sales
			if($_GET['product_name']){
				$product_id = $_GET['product_name'];	
			} else {
				$product_id = NULL;
			}
			if($_GET['to_date']){
				$to_date = $_GET['to_date'];
				$to_date = $accounts->_date('Y-m-d H:i:s', $to_date);	
			} else {
				$to_date = NULL;
			}
			if($_GET['from_date']){
				$from_date = $_GET['from_date'];
				$from_date = $accounts->_date('Y-m-d H:i:s', $from_date);
			} else {
				$from_date = NULL;	
			}
			$results = $accounts->get_sales_report($product_id, $to_date, $from_date);
			?>			
		</div><!-- Row Close -->
	</div><!-- Container Close -->


	<div class="container" style="margin-bottom:50px; text-align:center;">
		<div class="row">
			<ul class="headingTable">
                <li class="col-md-1">No.</li>
                <li class="col-md-4 nopadding">Product</li>
                <li class="col-md-2 nopadding">Date</li>
                <li class="col-md-1 nopadding">Cost</li>
                <li class="col-md-1">Price</li>
                <li class="col-md-1">Quantity</li>
                <li class="col-md-2 nopadding noborderRight">Total</li>
                <div class="clearfix"></div>
        	</ul>
        	<ul>
        		<?php 
        		$count = 1;
        		$sub_total = 0;
        		foreach ($results as $key => $value) { ?>
        		<li class="col-md-12 nopadding product_list">
        			<div class="col-md-1"><?php echo $count; ?></div>
        			<div class="col-md-4 nopadding"><?php echo $value->p_name; ?></div>
 					<div class="col-md-2 nopadding"><?php echo $accounts->_date($format = 'Y-m-d', $value->sales_date); ?></div>
	                <div class="col-md-1 nopadding"><?php echo $value->sales_cost; ?></div>
	                <div class="col-md-1"><?php echo $value->sales_price; ?></div>
	                <div class="col-md-1"><?php echo $value->sales_quantity; ?></div>
	                <div class="col-md-2 nopadding noborderRight"><?php echo $total = $value->sales_total; ?></div>
        		</li>
        		<?php
        		$count++;
        		$sub_total += $total;
        		}
        		?>
        	</ul>
		</div>
		<?php echo $sub_total; ?>
	</div>
	<div class="clear"></div>
</section>
<?php require_once 'footer.php'; ?>