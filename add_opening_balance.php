<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Supplier</p>
			</div>
			
			<?php 
			$supplier = new supplier();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

			if (isset($_POST['add_supplier'])) {
				// Update old record
				if (isset($ID)) {
					$results = $supplier->update_supplier($_POST, $ID);
				}else{ // Insert new
					$results = $supplier->add_supplier($_POST);
				}

				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Supplier Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 

			if (isset($ID)) {
				$supplier_result = $supplier->get_supplier($ID);
			}
			?>

			<form class="form-horizontal dashboardForm" action="" method="post">
				<div class="col-md-6">	
					<div class="form-group">
						<label for="sname" class="col-sm-3 control-label">Supplier Name: </label>
						<div class="col-sm-8">
							<input type="text" name="sname" id="sname" value="<?php echo (isset($ID))? $supplier_result->sup_name : '' ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-3 control-label">Phone No: </label>
						<div class="col-sm-8">
							<input type="text" name="phone" id="phone" value="<?php echo (isset($ID))? $supplier_result->sup_phone : '' ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="city" class="col-sm-3 control-label">City: </label>
						<div class="col-sm-8">
							<input type="text" name="city" id="city" value="<?php echo (isset($ID))? $supplier_result->sup_city : '' ?>" class="form-control" required>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-6">	
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email: </label>
						<div class="col-sm-8">
							<input type="email" name="email" id="email" value="<?php echo (isset($ID))? $supplier_result->sup_email : '' ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-3 control-label">Address: </label>
						<div class="col-sm-8">
							<input type="text" name="address" id="address" value="<?php echo (isset($ID))? $supplier_result->sup_address : '' ?>" class="form-control" required>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-6">	
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn submitBtn" name="add_supplier"><?php echo (isset($ID))? 'Update' : 'Add' ?> Supplier</button>
						</div>
				  	</div>
				</div><!-- Col-md-6 Close -->
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>