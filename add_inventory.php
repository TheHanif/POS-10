<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="inventory.php">Inventory</a></li>
			<li class="active">Add Inventory Products</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Inventory Products</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
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
					echo '<div class="alert alert-success alert-block fade in alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Add Inventory Sucessfully</strong> in Unit
				</div>';
				}else{
					echo '<div class="alert alert-danger alert-block fade in alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error</strong>
				</div>';
				}
			}
			if (isset($ID)) {
				$inventory_result = $inventory->inv_get($ID);
			}
			?>
		
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<?php 
						if (!isset($ID)){
						?>
						<legend>Select Ware House Product Name: </legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Select Ware House Product Name: </label>
							<div class="col-lg-5">
								<select data-placeholder="Choose a Product..." class="form-control chosen-select" tabindex="2" name="product_id" id="warehouse_product_id">
								<option value="Empty">&nbsp;</option>
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
						<?php 
						}
						?>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Item Name</label>
							<div class="col-lg-5">
								<input type="text" name="inv_name" id="inv_name" value="<?php echo (isset($ID))? $inventory_result->p_name : '' ?>" class="form-control" />
								<input type="hidden" name="inv_id" id="inv_id" value="<?php echo (isset($ID))? $inventory_result->inv_pid : '' ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Barcode</label>
							<div class="col-lg-5">
								<input type="text" name="inv_barcode" id="inv_barcode" value="<?php echo (isset($ID))? $inventory_result->inv_barcode : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Price</label>
							<div class="col-lg-5">
								<input type="text" name="inv_price" id="inv_price" value="<?php echo (isset($ID))? $inventory_result->inv_price : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Cost</label>
							<div class="col-lg-5">
								<input type="text" name="inv_cost" id="inv_cost" value="<?php echo (isset($ID))? $inventory_result->inv_cost : '' ?>"  class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Quantity</label>
							<div class="col-lg-5">
								<input type="text" name="inv_quantity" id="inv_quantity" value="<?php echo (isset($ID))? $inventory_result->inv_quantity : '' ?>" class="form-control" required>
							</div>
						</div>

					</fieldset>

					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-success btn-perspective btn-lg"  name="add_inventory"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Product in Unit</button>
						</div>
					</div>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>