<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Offer</p>
			</div>
			
			<?php 
			$product = new product();
			$all_product = $product->get_product();

			$offer = new offer();
			
			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_offer'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $offer->update_offer($_POST, $ID);
				}else{ // Insert new
					$results = $offer->insert_offer($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Offer Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$product_result = $offer->get_products($ID);
				$offer_result	= $offer->get_offers($ID);
				// print_f($offer_result);
			}
			?>

			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="itemname" class="col-sm-3 control-label">Product Name: </label>
					<div class="col-sm-8" style="margin-top:7px;">
						<?php
						if(isset($ID)){ ?>
							<input type="text" name="product_id" value="<?php echo (isset($ID))? $product_result->p_name : '' ?>" class="form-control" required disabled>
							<input type="hidden" name="product_id" value="<?php echo (isset($ID))? $product_result->p_id : '' ?>" class="form-control" required>
						<?php
						}
						else { ?>
							<select name="product_id" id="product_id">
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
			</div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="min_purchase" class="col-sm-4 control-label">Min Purchase Quantity: </label>
					<div class="col-sm-7">
						<input type="text" name="min_purchase" value="<?php echo (isset($ID))? $product_result->discount_min_purchase_qty : '' ?>" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="clear"></div>
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

			
	
			<div class="col-md-12">
				<h4 class="floatLeft">Add Product: </h4>
				<input type="button" class="btn add-btn floatRight" value="" onclick="addRow1()">
			</div>
			<div class="clear"></div>
			<hr/>
			<div id="content1">
				<?php 
				if(isset($ID)){
					foreach ($offer_result as $offer) {
					?>
					<div class="row">
						<div class="col-md-12 row-el">
							<div class="form-group">
								<label for="min_purchase" class="col-md-1 control-label">Product: </label>
								<div class="col-md-4">
										<input type="text" value="<?php echo (isset($ID))? $offer->p_name : '' ?>" class="form-control" disabled >
										<input type="hidden" name="offer[product_id][]" value="<?php echo (isset($ID))? $offer->offer_product_id : '' ?>" class="form-control" >
								</div>
								<label for="min_purchase" class="col-md-1 col-md-offset-1 control-label">Quantity: </label>
								<div class="col-md-4">
									<input type="text" name="offer[qty][]" value="<?php echo (isset($ID))? $offer->offer_product_quantity : '' ?>" class="form-control" >
								</div>
								<div class="col-md-1">
									  <input type="button" class="btn minus-btn">
								</div>
							</div>
						</div>
					</div>
					<?php
					} 
				}
				else {
				?>
				<div class="row">
					<div class="col-md-12 row-el">
						<div class="form-group">
							<label for="min_purchase" class="col-md-1 control-label">Product: </label>
							<div class="col-md-4">
									<select name="offer[product_id][]">
										<?php foreach($all_product as $product) { ?>
											<option value="<?php echo $product->p_id; ?>"><?php echo $product->p_name; ?></option>
										<?php } ?>
									</select>
							</div>
							<label for="min_purchase" class="col-md-1 col-md-offset-1 control-label">Quantity: </label>
							<div class="col-md-4">
								<input type="text" name="offer[qty][]" value="<?php echo (isset($ID))? $offer->product_quantity : '' ?>" class="form-control" >
							</div>
							<div class="col-md-1">
								  <input type="button" class="btn minus-btn">
							</div>
						</div>
					</div>
				</div>
				<?php 
				}
				?>


			</div><!-- Close # Content 1 -->

			<div class="clear"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<input type="hidden" name="type" value="offer" class="form-control" required>
						<button type="submit" class="btn submitBtn" name="add_offer"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Offer</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>