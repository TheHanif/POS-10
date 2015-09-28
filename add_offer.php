<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="promotions.php">Promotions</a></li>
			<li><a href="view_offer.php">Offer</a></li>
			<li class="active">Add Offer</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Offer</h3>
		  </div>
		  <div class="panel-body">
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
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Product Name</label>
							<div class="col-lg-5">
								<?php
								if(isset($ID)){ ?>
									<input type="text" name="product_id" value="<?php echo (isset($ID))? $product_result->p_name : '' ?>" class="form-control" required disabled>
									<input type="hidden" name="product_id" value="<?php echo (isset($ID))? $product_result->p_id : '' ?>" class="form-control" required>
								<?php
								}
								else { ?>
									<select data-placeholder="Choose a Product..." class="form-control chosen-select" tabindex="2"  name="product_id" id="product_id">
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
							<label class="col-lg-3 control-label">Min Purchase Quantity</label>
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
						
						<legend>Add Product <a onclick="addRow1()" class="btn btn-default  active pull-right"><i class="fa fa-plus"></i></a></legend>
						

						<div id="content1">
						<?php 
						if(isset($ID)){
							foreach ($offer_result as $offer) {
							?>
							<div class="row">
								<div class="col-sm-12 row-el">
									<div class="form-group">
										<label class="col-sm-2 control-label">Product: </label>
										<div class="col-sm-4">
												<input type="text" value="<?php echo (isset($ID))? $offer->p_name : '' ?>" class="form-control" disabled >
												<input type="hidden" name="offer[product_id][]" value="<?php echo (isset($ID))? $offer->offer_product_id : '' ?>" class="form-control" >
										</div>
										<label for="min_purchase" class="col-sm-2 control-label">Quantity: </label>
										<div class="col-sm-2">
											<input type="number" name="offer[qty][]" value="<?php echo (isset($ID))? $offer->offer_product_quantity : '' ?>" class="form-control" >
										</div>
										<div class="col-sm-2">
												<a class="btn btn-default active minus-btn pull-right"><i class="fa fa-minus"></i></a>
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
							<div class="col-sm-12 row-el">
								<div class="form-group">
									<label class="col-sm-2 control-label">Product: </label>
									<div class="col-sm-4">
											<select data-placeholder="Choose a Product..." class="form-control chosen-select" tabindex="2"  name="offer[product_id][]">
											<option value="Empty">&nbsp;</option>
												<?php foreach($all_product as $product) { ?>
													<option value="<?php echo $product->p_id; ?>"><?php echo $product->p_name; ?></option>
												<?php } ?>
											</select>
									</div>
									<label for="min_purchase" class="col-sm-2 control-label">Quantity: </label>
									<div class="col-sm-2">
										<input type="number" name="offer[qty][]" value="<?php echo (isset($ID))? $offer->product_quantity : '' ?>" class="form-control" >
									</div>
									<div class="col-sm-2">
										  <a class="btn btn-default active minus-btn pull-right"><i class="fa fa-minus"></i></a>
									</div>
								</div>
							</div>
						</div>
						<?php 
						}
						?>


					</div><!-- Close # Content 1 -->

					<div class="clear"></div>

						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<input type="hidden" name="type" value="offer" class="form-control" required>
								<button type="submit" class="btn btn-success btn-perspective btn-lg"  name="add_offer"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Offer</button>					
							</div>
						</div>

					</fieldset>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<script type="text/javascript">
	// Minus Button function for Offer Page
	$("#content1").on('click', '.minus-btn', function() {
		$(this).parents('.row-el').parent('.row').remove();
	});
			
	function addRow1() {
	var div = document.createElement('div');

	div.className = 'row';
	div.innerHTML = '<div class="col-sm-12 row-el">\
						<div class="add-div form-group">\
							<label for="min_purchase" class="col-sm-2 control-label">Product: </label>\
							<span class="col-sm-4">\
								<select data-placeholder="Choose a Product..." class="form-control chosen-select" tabindex="2"  name="offer[product_id][]">\
								<option value="Empty">&nbsp;</option>'+<?php foreach($all_product as $product) { ?>'<option value="<?php echo $product->p_id; ?>"><?php echo $product->p_name; ?></option>'+<?php } ?>
								'</select>\
							</span>\
							<label for="min_purchase" class="col-sm-2 control-label">Quantity: </label>\
							<span class="col-sm-2">\
								<input type="number" name="offer[qty][]" value="" class="form-control" required>\
							</span>\
							<span class="col-sm-2">\
								  <a class="btn btn-default active minus-btn pull-right"><i class="fa fa-minus"></i></a>\
							</span>\
						</div>';
	 document.getElementById('content1').appendChild(div);
	} 
</script>

<script type="text/javascript">
	$("#searchIcon").on('click', function(event) {
    	event.preventDefault();
    	$("#searchBox").toggle();
    });
</script>
<?php require_once 'footer.php'; ?>