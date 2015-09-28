<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="accounts.php">Accounts</a></li>
			<li><a href="view_assets.php">Assets</a></li>
			<li class="active"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Assets</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Assets</h3>
		  </div>
		  <div class="panel-body">
			<?php 
			$accounts = new accounts();
			
			$bank = new bank();
			$bank_result = $bank->get_banks();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_assets'])) {
				$type = $_POST['assets_type'];
				$amount = $_POST['assets_amount'];
				$payment_mode = $_POST['assets_payment_mode'];
				$bank = $_POST['bank_name'];
				$due_date = $_POST['due_date'];
				$detail = $_POST['assets_detail'];
				// Update old record
				if (isset($ID)) {
					$results = $accounts->update_assets($type, $amount, $payment_mode, $bank, $due_date, $detail, $ID);
				}else{ // Insert new
					$results = $accounts->create_assets($type, $amount, $payment_mode, $bank, $due_date, $detail);
				}
				
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Assets Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 

			if (isset($ID)) {
				$assets_result = $accounts->get_assets($ID);
			}
			?>
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Assets Type</label>
							<div class="col-lg-5">
								<select data-placeholder="Choose a Assets..." class="form-control chosen-select" tabindex="2"  name="assets_type" required>
									<option></option>
									<optgroup label="Current Assets">
										<?php foreach ($current_assets as $key => $value) { ?>
											<option value="<?php echo $key; ?>" <?php if(isset($ID) && $key == $assets_result[0]->assets_type){echo 'selected=selected';}?>><?php echo $value; ?></option>
										<?php
										} 
										?>
									</optgroup>
									<optgroup label="Fixed Assets">
										<?php foreach ($fixed_assets as $key => $value) { ?>
											<option value="<?php echo $key; ?>" <?php if(isset($ID) && $key == $assets_result[0]->assets_type){echo 'selected=selected';}?>><?php echo $value; ?></option>
										<?php
										} 
										?>
									</optgroup>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Amount</label>
							<div class="col-lg-5">
								<input type="text" name="assets_amount" id="assets_amount" value="<?php echo (isset($ID))? $assets_result[0]->assets_amount : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Payment Mode</label>
							<div class="col-lg-5">
								<select name="assets_payment_mode" class="form-control" id="payment_mode" required>
									<option value="">Select Payment Mode</option>
									<option value="cash" <?php if(isset($ID) && 'cash' == $assets_result[0]->assets_payment_mode){echo 'selected=selected';}?>>Cash</option>
									<option value="cheque" <?php if(isset($ID) && 'cheque' == $assets_result[0]->assets_payment_mode){echo 'selected=selected';}?>>Cheque</option>
								</select>
							</div>
						</div>
						<div id="payment_cheque_mode" <?php if(isset($ID) && 'cash' == $assets_result[0]->assets_payment_mode){echo 'style="display:none;"';}?>>
							<div class="form-group">
								<label class="col-lg-3 control-label">Bank Name</label>
								<div class="col-lg-5">
									<select data-placeholder="Choose a Bank..." class="form-control chosen-select" tabindex="2"  name="bank_name">
										<option></option>
										<?php foreach ($bank_result as $bank) { ?>
									    	<option value="<?php echo $bank->bank_id; ?>" <?php if(isset($ID) && $bank->bank_id == $assets_result[0]->assets_bank){echo 'selected=selected';}?>><?php echo $bank->bank_name .' - '. $bank->bank_branch; ?></option>
									    <?php
											}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Due Date</label>
								<div class="col-lg-5">
									<input type="text" class="form-control datepicker" name="due_date" data-date-format="mm-dd-yy" placeholder="mm-dd-yy" value="<?php echo (isset($ID))? $assets_result[0]->assets_due_date : '' ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Detail</label>
							<div class="col-lg-5">
								<textarea type="text" rows="5" name="assets_detail" id="assets_detail" class="form-control" required><?php echo (isset($ID))? $assets_result[0]->assets_detail : '' ?></textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-success btn-perspective btn-lg"  name="add_assets"><?php echo (isset($ID))? 'Update' : 'Add' ?> Assets</button>					
							</div>
						</div>

					</fieldset>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>