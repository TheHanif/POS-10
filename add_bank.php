<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="banks.php">Bank</a></li>
			<li class="active"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Bank</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Bank</h3>
		  </div>
		  <div class="panel-body">
			<?php 
			$bank = new bank();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

			if (isset($_POST['add_bank'])) {
				// Update old record
				if (isset($ID)) {
					$results = $bank->update_bank($_POST, $ID);
				}else{ // Insert new
					$results = $bank->add_bank($_POST);
				}

				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Bank Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 

			if (isset($ID)) {
				$bank_result = $bank->get_banks($ID);
			}
			?>
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Bank Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Bank Name</label>
							<div class="col-lg-5">
								<input type="text" name="bank_name" value="<?php echo (isset($ID))? $bank_result[0]->bank_name : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Bank Branch</label>
							<div class="col-lg-5">
								<input type="text" name="bank_branch" id="bank_branch" value="<?php echo (isset($ID))? $bank_result[0]->bank_branch : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Branch Code</label>
							<div class="col-lg-5">
								<input type="text" name="bank_branch_code" id="bank_branch_code" value="<?php echo (isset($ID))? $bank_result[0]->bank_br_code : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Account No</label>
							<div class="col-lg-5">
								<input type="text" name="bank_account_no" id="bank_account_no" value="<?php echo (isset($ID))? $bank_result[0]->bank_account_no : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Account Type</label>
							<div class="col-lg-5">
								<input type="text" name="bank_account_type" id="bank_account_type" value="<?php echo (isset($ID))? $bank_result[0]->bank_account_type : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Account Title</label>
							<div class="col-lg-5">
								<input type="text" name="bank_account_title" id="bank_account_title" value="<?php echo (isset($ID))? $bank_result[0]->bank_account_title : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Opening Balance</label>
							<div class="col-lg-5">
								<input type="text" name="bank_opening_balance" id="bank_opening_balance" value="<?php echo (isset($ID))? $bank_result[0]->bank_opening_balance : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">IBN Number</label>
							<div class="col-lg-5">
								<input type="text" name="bank_ibn_number" id="bank_ibn_number" value="<?php echo (isset($ID))? $bank_result[0]->bank_ibn_no : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Bank Address</label>
							<div class="col-lg-5">
								<input type="text" name="bank_address" id="bank_address" value="<?php echo (isset($ID))? $bank_result[0]->bank_address : '' ?>" class="form-control" required>
							</div>
						</div>

						
						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-success btn-perspective btn-lg"  name="add_bank"><?php echo (isset($ID))? 'Update' : 'Add' ?> Bank</button>					
							</div>
						</div>

					</fieldset>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>