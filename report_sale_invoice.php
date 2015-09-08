<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$sales = new sales();
			$all_sales = $sales->get_all_sale();
			//print_f($all_sales);
			if (isset($_POST['show_report'])) {	
				
				if($_POST['person_name']){
					$invoice_number = $_POST['person_name'];	
				} else {
					$invoice_number = NULL;
				}

				$results = $sales->get_sale_invoice_report($invoice_number);
				//print_f($results);
			}
			?>			
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"> Sale Invoice Report </p>
			</div>
			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-4">	
				<div class="form-group">
					<label for="person_name" class="col-sm-12">Invoice Number: </label>
					<div class="col-sm-12">
						<select name="person_name" data-placeholder="Enter Invoice Number" class="chosen-select" tabindex="4">
							<option value=""></option>
							<?php 
							foreach($all_sales as $key => $value){ 
							?>
								<option value="<?php echo $value->sale_id; ?>"<?php if(isset($_POST['person_name'] ) && $_POST['person_name'] == $value->sale_id){echo 'selected=selected';}?>><?php echo $value->sale_bill_number; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div><!-- Col-md-3 Close -->
			
			<div class="col-md-4">
				<div class="form-group">
					<label for="p_supplier" class="col-sm-12">&nbsp;</label>
					<div class="col-sm-12">
						<button type="submit" class="btn submitBtn floatRight" name="show_report">Show Report</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
	
	<div class="container" style="margin-bottom:50px; text-align:center;">
		<div class="row">
			<?php 
			if (isset($results)) { 
			?>
			<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
				<tr>
					<th>No.</th>
					<th>Product Name</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Total</th>
				</tr>
					<?php 
					$count = 1;
					$total = 0;
					$total_daily_sale = 0;
        			foreach ($results as $key => $value){ ?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $value->p_name; ?></td>
					<td><?php echo $qty = $value->salepro_product_quantity; ?></td>
					<td><?php echo $price = $value->salepro_product_price; ?></td>
					<td><?php echo $total = $qty*$price; ?></td>
				</tr>
					<?php
					$count++;
					$total_daily_sale += $total;
					}
					?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>Total Bill Amount:</td>
					<td><?php echo $total_daily_sale; ?></td>
				</tr>
			</table>
			<?php }
			?>
		</div>
	</div>
	<div class="clear"></div>
</section>
<?php require_once 'footer.php'; ?>