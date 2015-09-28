<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="promotions.php">Promotions</a></li>
			<li><a href="view_discount.php">Discount</a></li>
			<li class="active">Add Discount</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Discount</h3>
		  </div>
		  <div class="panel-body">
			<?php 
			$product = new product();
			$all_product = $product->get_product();

			$discount = new discount();
			
			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_discount'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $discount->update_discount($_POST, $ID);
				}else{ // Insert new
					$results = $discount->insert_discount($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Discount Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$product_result = $discount->get_products($ID);
			}
			?>
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Product Name</label>
							<div class="col-lg-5">
								<select data-placeholder="Choose a Supplier..." class="form-control chosen-select" tabindex="2"  name="product_id" id="product_id">
								<option value="Empty">&nbsp;</option>
									<?php 
									foreach ($all_product as $product) { ?>
									<option value="<?php echo $product->p_id; ?>"<?php (isset($ID))? $pro = $product_result->discount_product_id : ''; if(isset($ID)){if($product->p_id == $pro){echo 'selected=selected';}}?>><?php echo $product->p_name; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Discount Type</label>
							<div class="col-lg-5">
								<select name="discount_type" class="form-control">
									<option value="flat" <?php if(isset($ID)){if($product_result->discount_type == 'flat'){echo 'selected=selected';}}?>>Flat</option>
									<option value="percent" <?php if(isset($ID)){if($product_result->discount_type == 'percent'){echo 'selected=selected';}}?>>Percent</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Discount Amount</label>
							<div class="col-lg-5">
								<input type="text" name="discount_amount" id="discount_amount" value="<?php echo (isset($ID))? $product_result->discount_amount : '' ?>" class="form-control <?php echo $product->p_price; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Min Purchase Quantity:</label>
							<div class="col-lg-5">
								<input type="text" name="min_purchase" value="<?php echo (isset($ID))? $product_result->discount_min_purchase_qty : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Offer Status</label>
							<div class="col-lg-5">
								<select name="status" class="form-control">
									<option value="1" <?php if(isset($ID)){if($product_result->discount_status == '1'){echo 'selected=selected';}}?>>Active</option>
									<option value="0" <?php if(isset($ID)){if($product_result->discount_status == '0'){echo 'selected=selected';}}?>>Deactive</option>
								</select>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<input type="hidden" name="type" value="discount" class="form-control" required>
								<button type="submit" class="btn btn-success btn-perspective btn-lg"  name="add_discount"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Discount</button>					
							</div>
						</div>

					</fieldset>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>