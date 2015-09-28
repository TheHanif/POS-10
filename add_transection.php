<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="banks.php">Bank</a></li>
			<li class="active"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Bank Transection</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?>  Bank Transection</h3>
		  </div>
		  <div class="panel-body">
			<?php 
			$bank = new bank();
			$bank_result = $bank->get_banks();
			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_transection'])) {
				// Update old record
				$results = $bank->add_transection_bank($_POST);
				
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Bank Transection Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 
			?>
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<div class="form-group">
							<label class="col-lg-3 control-label">Bank Name</label>
							<div class="col-lg-5">
								<select data-placeholder="Choose a Bank..." class="form-control chosen-select" tabindex="2"  name="transection_bank">
									<option></option>
									<?php foreach ($bank_result as $bank) { ?>
								    	<option value="<?php echo $bank->bank_id; ?>"><?php echo $bank->bank_name .' - '. $bank->bank_branch; ?></option>
								    <?php
										}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Amount</label>
							<div class="col-lg-5">
								<input type="text" name="transection_amount" id="transection_amount" value="" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Transection Type</label>
							<div class="col-lg-5">
								<select name="transection_type" class="form-control" required>
									<option value="">Select Type</option>
									<option value="credit">Credit</option>
									<option value="debit">Debit</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Payment Mode</label>
							<div class="col-lg-5">
								<select name="transection_payment_mode" class="form-control" required>
									<option value="">Select Payment Mode</option>
									<option value="case">Cash</option>
									<option value="cheque">Cheque</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Detail</label>
							<div class="col-lg-5">
								<textarea type="text" rows="5" name="transection_detail" id="transection_detail" class="form-control" required></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-success btn-perspective btn-lg" name="add_transection"><?php echo (isset($ID))? 'Update' : 'Add' ?> Bank Transection</button>
							</div>
						</div>

					</fieldset>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>