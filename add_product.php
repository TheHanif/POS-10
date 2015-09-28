<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="products.php">Products</a></li>
			<li class="active"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Product</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Product</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<?php 
			$product = new product();
			$product_category = $product->get_product_category();

			// Add New Product in Supplier
			if(isset($_GET['supplier_id'])){
				$supplier_id = $_GET['supplier_id'];
				$suppliers = new supplier();
				$suppliers_list = $suppliers->get_supplier($supplier_id);
			}
			// Update Product Get all Supplier List
			else {
				$suppliers = new supplier();
				$suppliers_list = $suppliers->get_suppliers();
			}

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_product'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $product->pro_update($_POST, $ID);
				}else{ // Insert new
					$results = $product->pro_insert($_POST);
				}
				if ($results) {
				echo '<div class="alert alert-success alert-block fade in alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Add Product Sucessfully</strong>
				</div>';
			}else{
				echo '<div class="alert alert-danger alert-block fade in alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error</strong>
				</div>';
			}
			}
			if (isset($ID)) {
				$product_result = $product->pro_get($ID);
			}
			?>
		
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Product Name</label>
							<div class="col-lg-5">
								<input type="text" name="p_name" value="<?php echo (isset($ID))? $product_result->p_name : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Supplier Name:</label>
							<div class="col-lg-5">
								<?php 
								if(isset($ID)){ 
									foreach($suppliers_list as $suplier){ 
										(isset($ID))? $sup = $product_result->p_supplier : ''; 
										if(isset($ID)){
											if($suplier->sup_id == $sup){
												echo $suplier->sup_name; 
												echo '<input type="hidden" name="p_supplier" value="'.$suplier->sup_id.'">';
											}
										}
									} 
								}
								else { // Add Product Page ?>
									<select data-placeholder="Choose a Product..." class="form-control chosen-select" tabindex="2" name="p_supplier">
										<option value="Empty">&nbsp;</option>
										<?php foreach($suppliers_list as $suplier){ ?>
											<option value="<?php echo $suplier->sup_id; ?>"><?php echo $suplier->sup_name; ?></option>
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
							<label class="col-lg-3 control-label">Cost</label>
							<div class="col-lg-5">
								<input type="text" name="p_cost" value="<?php echo (isset($ID))? $product_result->p_cost : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Price</label>
							<div class="col-lg-5">
								<input type="text" name="p_price" value="<?php echo (isset($ID))? $product_result->p_price : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">GST</label>
							<div class="col-lg-5">
								<input type="text" name="p_gst" value="<?php echo (isset($ID))? $product_result->p_gst : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">VAT</label>
							<div class="col-lg-5">
								<input type="text" name="p_vat" value="<?php echo (isset($ID))? $product_result->p_vat : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Barcode</label>
							<div class="col-lg-5">
								<input type="text" name="p_barcode" value="<?php echo (isset($ID))? $product_result->p_barcode : '' ?>" class="form-control" required>
							</div>
						</div>

					</fieldset>

					<fieldset>
						<legend>Product Cateogry</legend>

							<div class="form-group">
								<label class="col-lg-3 control-label">Category Name:</label>
								<div class="col-lg-5">
									<select data-placeholder="Choose a Product Category..." class="form-control chosen-select" tabindex="2" name="p_category">
										<option></option>
										<?php 
										foreach($product_category as $key => $value) { ?>
											<option value="<?php echo $value->pc_id; ?>" <?php if(isset($ID) && $value->pc_id == $product_result->p_category){echo 'selected=selected';}?>><?php echo $value->pc_name; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
					</fieldset>

					<fieldset>
						<legend>Product Volume</legend>

							<div class="form-group">
								<label class="col-lg-3 control-label">Type:</label>
								<div class="col-lg-5">
									<select name="p_volumetype" class="form-control" required>
										<?php 
										foreach($product_volume as $product_volume=>$value){ ?>
										<option value="<?php echo $product_volume; ?>" <?php (isset($ID))? $pro = $product_result->p_volumetype : ''; if(isset($ID)){if($product_volume == $pro){echo 'selected=selected';}}?>><?php echo $value; ?></option>
										<?php	
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Value</label>
								<div class="col-lg-5">
									<input type="text" name="p_volumevalue" value="<?php echo (isset($ID))? $product_result->p_volumevalue : '' ?>" class="form-control" required>
								</div>
							</div>
					</fieldset>

					<fieldset>
						<legend>Product Policy</legend>

							<div class="form-group">
								<label class="col-lg-3 control-label">Return Policy</label>
								<div class="col-lg-5">
									<?php if(isset($ID)){
										$return_policy = $product_result->p_return;
									}
									?>
									<input type="radio" name="p_return" class="return_policy" value="yes" <?php if(isset($ID)){if($return_policy == 'yes'){echo 'checked';}}?>> Yes
									<input type="radio" name="p_return" class="return_policy" value="no" <?php if(isset($ID)){if($return_policy == 'no'){echo 'checked';}}?>> No
								</div>
							</div>
							
							<div class="form-group return_detail" <?php if(isset($ID)){if($return_policy == 'no'){echo 'style="display:none;"';}}?>>
								<label class="col-lg-3 control-label">&nbsp;</label>
								<div class="col-lg-5">
									<textarea name="p_return_detail" class="form-control"><?php echo (isset($ID))? $product_result->p_return_detail : '' ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Exchange Policy</label>
								<div class="col-lg-5">
									<?php if(isset($ID)){
										$exchange_policy = $product_result->p_exchange;
									}
									?>
									<input type="radio" name="p_exchange" class="exchange_policy" value="yes" <?php if(isset($ID)){if($exchange_policy == 'yes'){echo 'checked';}}?>> Yes
									<input type="radio" name="p_exchange" class="exchange_policy" value="no" <?php if(isset($ID)){if($return_policy == 'no'){echo 'checked';}}?>> No
								</div>
							</div>

							<div class="form-group exchange_detail" <?php if(isset($ID)){if($exchange_policy == 'no'){echo 'style="display:none;"';}}?>>
								<label class="col-lg-3 control-label">&nbsp;</label>
								<div class="col-lg-5">
									<textarea name="p_exchange_detail" class="form-control"><?php echo (isset($ID))? $product_result->p_exchange_detail : '' ?></textarea>
								</div>
							</div>
					</fieldset>

					<fieldset>
						<legend>SKU Detail</legend>

							<div class="form-group">
								<label class="col-lg-3 control-label">Crate</label>
								<div class="col-lg-5">
									<input type="text" name="p_skucrate" value="<?php echo (isset($ID))? $product_result->p_skucrate : '' ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Carton</label>
								<div class="col-lg-5">
									<input type="text" name="p_skucarton" value="<?php echo (isset($ID))? $product_result->p_skucarton : '' ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Bag</label>
								<div class="col-lg-5">
									<input type="text" name="p_skubag" value="<?php echo (isset($ID))? $product_result->p_skubag : '' ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Box</label>
								<div class="col-lg-5">
									<input type="text" name="p_skubox" value="<?php echo (isset($ID))? $product_result->p_skubox : '' ?>" class="form-control" required>
								</div>
							</div>
					</fieldset>

					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-success btn-perspective btn-lg" name="add_product"><?php echo (isset($ID))? 'Update' : 'Add' ?> Product</button>
						</div>
					</div>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>