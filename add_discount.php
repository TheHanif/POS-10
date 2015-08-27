<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Discount</p>
			</div>
			
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

			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-12">
				<h4>Product Detail: </h4>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="itemname" class="col-sm-3 control-label">Product Name: </label>
					<div class="col-sm-8" style="margin-top:7px;">
						<select name="product_id" id="product_id">
							<?php 
							foreach ($all_product as $product) { ?>
							<option value="<?php echo $product->p_id; ?>"<?php (isset($ID))? $pro = $product_result->discount_product_id : ''; if(isset($ID)){if($product->p_id == $pro){echo 'selected=selected';}}?>><?php echo $product->p_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="discount_type" class="col-sm-3 control-label">Discount Type: </label>
					<div class="col-sm-8">
						<select name="discount_type">
							<option value="flat" <?php if(isset($ID)){if($product_result->discount_type == 'flat'){echo 'selected=selected';}}?>>Flat</option>
							<option value="percent" <?php if(isset($ID)){if($product_result->discount_type == 'percent'){echo 'selected=selected';}}?>>Percent</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="discount_amount" class="col-sm-3 control-label">Discount Amount: </label>
					<div class="col-sm-8">
						<input type="text" name="discount_amount" id="discount_amount" value="<?php echo (isset($ID))? $product_result->discount_amount : '' ?>" class="form-control <?php echo $product->p_price; ?>" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
					<label for="min_purchase" class="col-sm-3 control-label">Min Purchase Quantity: </label>
					<div class="col-sm-8">
						<input type="text" name="min_purchase" value="<?php echo (isset($ID))? $product_result->discount_min_purchase_qty : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
					<label for="min_purchase" class="col-sm-3 control-label">Offer Status: </label>
					<div class="col-sm-8">
						<select name="status">
							<option value="1" <?php if(isset($ID)){if($product_result->discount_status == '1'){echo 'selected=selected';}}?>>Active</option>
							<option value="0" <?php if(isset($ID)){if($product_result->discount_status == '0'){echo 'selected=selected';}}?>>Deactive</option>
						</select>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<input type="hidden" name="type" value="discount" class="form-control" required>
						<button type="submit" class="btn submitBtn" name="add_discount"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Discount</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>