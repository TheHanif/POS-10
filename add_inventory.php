<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Inventory</p>
			</div>
			
			<?php 
			$product = new product();
			$all_product = $product->get_product();

			$warehouse = new warehouse();
			$all_product_warehouse = $warehouse->get_products();
			

			$inventory = new inventory();
			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_inventory'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $inventory->inv_update($_POST, $ID);
				}else{ // Insert new
					$results = $inventory->inv_insert($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Inventory Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$inventory_result = $inventory->inv_get($ID);
			}
			?>
			<?php 
			if (!isset($ID)){
			?>
			<div class="col-md-12">	
				<div class="form-group">
					<label for="itemname" class="col-md-3 control-label">Select Ware House Product Name: </label>
					<div class="col-md-9" style="margin-bottom:15px;">
						<select name="product_id" id="warehouse_product_id">
							<?php 
							foreach ($all_product_warehouse as $warehouse_product) { 
							?>
								<option value="<?php echo $warehouse_product->product_id; ?>"><?php echo $warehouse_product->p_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="clear"></div>
			<?php 
			}
			?>
			<form class="form-horizontal dashboardForm"  action="add_inventory.php<?php echo isset($ID)? ('?id='.$ID) : ''; ?> " method="post">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="itemname" class="col-sm-3 control-label">Item Name: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_name" id="inv_name" value="<?php echo (isset($ID))? $inventory_result->p_name : '' ?>" class="form-control"  />
						<input type="hidden" name="inv_id" id="inv_id" value="<?php echo (isset($ID))? $inventory_result->inv_pid : '' ?>">
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="fname" class="col-sm-3 control-label">Cost: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_cost" id="inv_cost" value="<?php echo (isset($ID))? $inventory_result->inv_cost : '' ?>"  class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Quantity: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_quantity" id="inv_quantity" value="<?php echo (isset($ID))? $inventory_result->inv_quantity : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="lname" class="col-sm-3 control-label">Price: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_price" id="inv_price" value="<?php echo (isset($ID))? $inventory_result->inv_price : '' ?>" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
				    <label for="lname" class="col-sm-3 control-label">Barcode: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_barcode" id="inv_barcode" value="<?php echo (isset($ID))? $inventory_result->inv_barcode : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn submitBtn" name="add_inventory"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Inventory</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>

<!--
<form action="add_inventory.php<?php echo isset($ID)? ('?id='.$ID) : ''; ?> " method="post">
	<label for="name">Item Name: <input type="text" name="inv_name" value="<?php echo (isset($ID))? $inventory_result->inv_name : '' ?>"></label><br>
	<label for="cost">Cost: <input type="text" name="inv_cost" value="<?php echo (isset($ID))? $inventory_result->inv_cost : '' ?>"></label><br>
	<label for="price">Price: <input type="text" name="inv_price" value="<?php echo (isset($ID))? $inventory_result->inv_price : '' ?>"></label><br>
	<label for="quantity">Quantity: <input type="text" name="inv_quantity" value="<?php echo (isset($ID))? $inventory_result->inv_quantity : '' ?>"></label><br>
	<label for="barcode">Barcode: <input type="text" name="inv_barcode" value="<?php echo (isset($ID))? $inventory_result->inv_barcode : '' ?>"></label><br><br>
	<input type="submit" name="add_inventory" value="Add Item">
</form>
-->
<?php require_once 'footer.php'; ?>