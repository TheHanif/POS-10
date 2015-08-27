<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Inventory</p>
			</div>
			
			<?php 
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

			<form class="form-horizontal dashboardForm"  action="add_inventory.php<?php echo isset($ID)? ('?id='.$ID) : ''; ?> " method="post">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="itemname" class="col-sm-3 control-label">Item Name: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_name" value="<?php echo (isset($ID))? $inventory_result->inv_name : '' ?>">
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="fname" class="col-sm-3 control-label">Cost: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_cost" value="<?php echo (isset($ID))? $inventory_result->inv_cost : '' ?>" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Quantity: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_quantity" value="<?php echo (isset($ID))? $inventory_result->inv_quantity : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="lname" class="col-sm-3 control-label">Price: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_price" value="<?php echo (isset($ID))? $inventory_result->inv_price : '' ?>" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
				    <label for="lname" class="col-sm-3 control-label">Barcode: </label>
					<div class="col-sm-8">
						<input type="text" name="inv_barcode" value="<?php echo (isset($ID))? $inventory_result->inv_barcode : '' ?>" class="form-control" required>
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