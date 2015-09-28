<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="suppliers.php">Suppliers</a></li>
			<li class="active">Add Supplier</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Supplier</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
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
		
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Supplier Name</label>
							<div class="col-lg-5">
								<input type="text" name="sname" id="sname" value="<?php echo (isset($ID))? $supplier_result->sup_name : '' ?>" class="form-control" required>
							</div>
						</div>			

						<div class="form-group">
							<label class="col-lg-3 control-label">Email</label>
							<div class="col-lg-5">
								<input type="email" name="email" id="email" value="<?php echo (isset($ID))? $supplier_result->sup_email : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Phone No</label>
							<div class="col-lg-5">
								<input type="text" name="phone" id="phone" value="<?php echo (isset($ID))? $supplier_result->sup_phone : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">City</label>
							<div class="col-lg-5">
								<input type="text" name="city" id="city" value="<?php echo (isset($ID))? $supplier_result->sup_city : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Address</label>
							<div class="col-lg-5">
								<input type="text" name="address" id="address" value="<?php echo (isset($ID))? $supplier_result->sup_address : '' ?>" class="form-control" required>
							</div>
						</div>

					</fieldset>

					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-success btn-perspective btn-lg" name="add_supplier"><?php echo (isset($ID))? 'Update' : 'Add' ?> Supplier</button>
						</div>
					</div>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>