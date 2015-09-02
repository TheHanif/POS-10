<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$product = new product();

			if (isset($_POST['show_report'])) {	
				$product_name 	= $_POST['product_name'];
				$supplier_name	= $_POST['supplier_name'];
				$product_place	= $_POST['product_place'];

				if($_POST['product_name']){
					$product_name = $_POST['product_name'];	
				} else {
					$product_name = NULL;
				}

				if($_POST['supplier_name']){
					$supplier_name = $_POST['supplier_name'];	
				} else {
					$supplier_name = NULL;
				}

				if($_POST['product_place']){
					$product_place = $_POST['product_place'];	
				} else {
					$product_place = NULL;
				}

				
				$results = $product->get_product_report($product_name, $supplier_name, $product_place);
				print_f($results);
			}
			?>			
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"> Product Report </p>
			</div>
			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-3">	
				<div class="form-group">
					<label for="product_name" class="col-sm-12">Product Name: </label>
					<?php 	$product = new product();
							$all_product = $product->get_product(); 
					?>
					<div class="col-sm-12">
						<select name="product_name">
							<option value="">Select Product</option>
							<?php 
							foreach($all_product as $product){ ?>					
									<option value="<?php echo $product->p_id; ?>"<?php if(isset($_POST['product_name'] ) && $_POST['product_name'] == $product->p_id){echo 'selected=selected';}?>><?php echo $product->p_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div><!-- Col-md-3 Close -->
			<div class="col-md-3">	
				<div class="form-group">
					<label for="supplier_name" class="col-sm-12">Supplier Name: </label>
					<?php 	$suppliers = new supplier();
							$all_suppliers = $suppliers->get_suppliers();
					?>
					<div class="col-sm-12">
						<select name="supplier_name">
							<option value="">Select Supplier</option>
							<?php 
							foreach ($all_suppliers as $supplier) { ?>
								<option value="<?php echo $supplier->sup_id; ?>"><?php echo $supplier->sup_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div><!-- Col-md-3 Close -->
			<div class="col-md-3">	
				<div class="form-group">
					<label for="product_place" class="col-sm-12">Unit / Warehouse: </label>
					<div class="col-sm-12">
						<select name="product_place">
							<option value="">Select Place</option>
								<option value="warehouse" <?php if(isset($_POST['product_place']) && $_POST['product_place'] == 'warehouse'){echo 'selected=selected';}?>>Warehouse</option>
								<option value="unit" <?php if(isset($_POST['product_place']) && $_POST['product_place'] == 'unit'){echo 'selected=selected';}?>>Unit</option>
						</select>
					</div>
				</div>
			</div><!-- Col-md-3 Close -->
			
			<div class="col-md-3">
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
			// print_f($results);
			?>
			<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
				<tr>
					<th>No.</th>
					<th>Product</th>
					<th>Date</th>
					<th>Cost</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
					<?php 
					$count = 1;
        			$sub_total = 0;
					foreach ($results as $key => $value){ ?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $value->p_name; ?></td>
					<td><?php echo $accounts->_date($format = 'd-m-Y', $value->sales_date); ?></td>
					<td><?php echo $value->sales_cost; ?></td>
					<td><?php echo $value->sales_price; ?></td>
					<td><?php echo $value->sales_quantity; ?></td>
					<td><?php echo $total = $value->sales_total; ?></td>
				</tr>
					<?php
					$count++;
        			$sub_total += $total;
					}
					?>
				<tr>
					<td colspan="6" style="text-align:right;"><strong>Total Sales: </strong></td>
					<td><strong><?php echo $sub_total; ?></strong></td>
				</tr>
			</table>
			<?php }
			?>
		</div>
	</div>
	<div class="clear"></div>
</section>
<?php require_once 'footer.php'; ?>