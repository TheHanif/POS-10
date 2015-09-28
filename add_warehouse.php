<?php require_once 'header.php'; ?>

<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="warehouse.php">Warehouse</a></li>
			<li class="active">Add Warehouse Product</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Warehouse Product</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<?php 
			$product = new product();
			$all_product = $product->get_product();

			$warehouse = new warehouse();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_product_warehouse'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $warehouse->update_product_warehouse($_POST, $ID);
				}else{ // Insert new
					$results = $warehouse->insert_product_warehouse($_POST);
				}

				if ($results) {
					echo '<div class="alert alert-success alert-block fade in alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Add Product Sucessfully</strong> in Warehouse
					</div>';
				}else{
					echo '<div class="alert alert-danger alert-block fade in alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Error</strong>
					</div>';
				}
			}
			if (isset($ID)) {
				$product_result = $warehouse->get_products($ID);
			}
			?>
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Product Name:</label>
							<div class="col-lg-5">
								<?php 
								if(isset($ID)){
									foreach ($all_product as $all_product => $product) {
										if($product->p_id == $product_result->product_id){
											echo $product->p_name;
											echo '<input type="hidden" name="product_id" value="'.$product_result->product_id.'" />';
										}
									} 
								}
								else {
								?>
								<select data-placeholder="Choose a Product..." class="form-control chosen-select" tabindex="2" name="product_id" id="product_id">
									<option value="Empty">&nbsp;</option>
									<?php 
									foreach ($all_product as $product) { ?>
									<option value="<?php echo $product->p_id; ?>"<?php (isset($ID))? $pro = $product_result->product_id : ''; if(isset($ID)){if($product->p_id == $pro){echo 'selected=selected';}}?>><?php echo $product->p_name; ?></option>
									<?php
									}
									?>
								</select>
								<?php
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Barcode</label>
							<div class="col-lg-5">
								<input type="text" name="product_barcode"  id="product_barcode" value="<?php echo (isset($ID))? $product_result->warehouse_barcode : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Cost</label>
							<div class="col-lg-5">
								<input type="text" name="product_cost" id="product_cost" value="<?php echo (isset($ID))? $product_result->warehouse_cost : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Price</label>
							<div class="col-lg-5">
								<input type="text" name="product_price" id="product_price" value="<?php echo (isset($ID))? $product_result->warehouse_price : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Quantity</label>
							<div class="col-lg-5">
								<input type="text" name="product_quantity"  value="<?php echo (isset($ID))? $product_result->warehouse_quantity : '' ?>" class="form-control" required>
							</div>
						</div>



						<div class="form-group">
							<label class="col-lg-3 control-label">Quantity Type:</label>
							<div class="col-lg-5">
								<select class="form-control" name="p_qtytype" required>
									<option value="">Select Type</option>
									<?php 
									foreach($skutype as $key => $value) { ?>
										<option value="<?php echo $key;?>" <?php if(isset($ID) && $key == $product_result->warehouse_qtytype){echo 'selected=selected';}?>><?php echo $value; ?></option>	
									<?php
										}
									?>
								</select>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend>Supplier Bill Detail</legend>

						<div class="form-group">
							<label class="col-lg-3 control-label">Supplier Bill</label>
							<div class="col-lg-5">
								<select data-placeholder="Choose a Supplier Bill..." class="form-control chosen-select" tabindex="2" name="sup_bill" required>
									<option value="">Select Bill</option>
									<?php 
									$suppliers = new supplier();
									$all_bills = $suppliers->get_bills();
									foreach($all_bills as $value) { ?>
										<option value="<?php echo $value->bill_id;?>" <?php if(isset($ID) && $value->bill_id == $product_result->warehouse_sp_bill){echo 'selected=selected';}?>><?php echo $value->bill_number; ?></option>	
									<?php
										}
									?>
								</select>
							</div>
						</div>
					</fieldset>

					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-success btn-perspective btn-lg" name="add_product_warehouse"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Product in Warehouse</button>
						</div>
					</div>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->


			
<?php require_once 'footer.php'; ?>