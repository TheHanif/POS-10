<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$product = new product();

			if (isset($_POST['show_report'])) {	
				$product_name 	= $_POST['product_name'];
				$product_place	= $_POST['product_place'];

				if($_POST['product_name']){
					$product_name = $_POST['product_name'];	
				} else {
					$product_name = NULL;
				}

				if($_POST['product_place']){
					$product_place = $_POST['product_place'];	
				} else {
					$product_place = NULL;
				}

				$results = $product->get_product_stock($product_name, $product_place);
				$results_inventory = $product->get_product_inventory_stock($product_name);
				$result_saleproducts = $product->get_product_sale_stock($product_name);
				//print_f($result_saleproducts);
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
			<div class="col-md-4">	
				<div class="form-group">
					<label for="product_name" class="col-sm-12">Product Name: </label>
					<?php 	$product = new product();
							$all_product = $product->get_product(); 
					?>
					<div class="col-sm-12">
						<select name="product_name" data-placeholder="Choose a Product Name" class="chosen-select" tabindex="4">
							<option value=""></option>
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
			
			<div class="col-md-4">	
				<div class="form-group">
					<label for="product_place" class="col-sm-12">Unit / Warehouse: </label>
					<div class="col-sm-12">
						<select name="product_place" required>
							<option value="">Select Place</option>
								<option value="warehouse" <?php if(isset($_POST['product_place']) && $_POST['product_place'] == 'warehouse'){echo 'selected=selected';}?>>Warehouse</option>
								<option value="unit" <?php if(isset($_POST['product_place']) && $_POST['product_place'] == 'unit'){echo 'selected=selected';}?>>Unit</option>
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
					<th>Product Quantity</th>
				</tr>
					<?php 
					$count = 1;
        			foreach ($results as $key => $value){ ?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $value->p_name; ?></td>
					<td>
						<?php 
						if(isset($_POST)){
							$product_place	= $_POST['product_place'];
							if($product_place == 'warehouse'){
								$inv_qty = $results_inventory[$count-1]->inventory_quantity;
								$warehouse_qty = $value->qty; 
								echo ($warehouse_qty-$inv_qty);
							}
							else {
								$sale_qty = $result_saleproducts[$count-1]->salepro_pro_quantity;
								$warehouse_qty = $value->qty; 
								echo ($warehouse_qty-$sale_qty);
							}
						}
						?>
					</td>
				</tr>
					<?php
					$count++;
					}
					?>
			</table>
			<?php }
			?>
		</div>
	</div>
	<div class="clear"></div>
</section>
<?php require_once 'footer.php'; ?>