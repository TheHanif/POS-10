<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="suppliers.php">Suppliers</a></li>
			<li class="active">Add Supplier Bill</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Supplier Bill</h3>
		  </div>
		  <div class="panel-body">
			<?php 
			$suppliers = new supplier();
			$all_suppliers = $suppliers->get_suppliers();
			
			$bank = new bank();
			$bank_result = $bank->get_banks();

			

			$accounts = new accounts();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_bill'])) {		
				$supplier_id = $_POST['supplier_id'];
				$bill_number = $_POST['bill_number'];
				$due_date = $_POST['due_date'];
				$bill_amount = $_POST['bill_amount'];
				$payment_type = $_POST['payment_type'];
				if($payment_type == 'cheque'){
					$type = 'credit';
				} else {
					$type = 'debit';
				}
				$bank_detail = $_POST['bank_detail'];
				if($bank_detail){
					$account = 'bank';
					$account_type = $bank_detail;
				}else {
					$account = NULL;
					$account_type = NULL;
				}
				$date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
					$date =	$date->format("j-n-Y");
		
				// Add General Ladger
				// $results = $accounts->create_general_ledger($amount, $type, $account, $account_type, $date);
				//$results_general_ledger = $accounts->create_general_ledger($bill_amount, $type, $account, $account_type, $date);
				
				$account = 'supplier';
				$account_type = $supplier_id;
				$type = 'payable';
				$status = 0;
				// Add Account Payable
				//$results = $accounts->create_payable_receviable($amount, $account, $person, $date, $due_date, $type, $status);
				//$results_account_payable = $accounts->create_payable_receviable($bill_amount, $account, $account_type, $date, $due_date, $type, $status);
				
				$results = $suppliers->add_bill($_POST);

				if (isset($results)) {
					echo '<div class="alert alert-success" role="alert"> Add Purchase Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			?>
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Bill Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Supplier Name</label>
							<div class="col-lg-5">
								<select data-placeholder="Choose a Supplier..." class="form-control chosen-select" tabindex="2" name="supplier_id" id="supplier_id">
								<option value="Empty">&nbsp;</option>
									<?php 
									foreach ($all_suppliers as $supplier) { ?>
									<option value="<?php echo $supplier->sup_id; ?>"><?php echo $supplier->sup_name; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Bill Number</label>
							<div class="col-lg-5">
								<input type="text" name="bill_number" value="" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Bill Due Date</label>
							<div class="col-lg-5">
								<input type="text" class="form-control datepicker" name="due_date" data-date-format="mm-dd-yy" placeholder="mm-dd-yy">
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Amount</label>
							<div class="col-lg-5">
								<input type="text" name="bill_amount" value="" class="form-control" required>
							</div>
						</div>
						
						<legend>Payment Mode:</legend>

						<div class="form-group">
							<label class="col-lg-3 control-label">Payment Type</label>
							<div class="col-lg-5">
								<select name="payment_type" id="payment_mode"  class="form-control">
									<option value="cash">Cash</option>
									<option value="cheque">Cheque</option>
								</select>
							</div>
						</div>

						<div id="payment_cheque_mode" style="display:none;">
							<div class="form-group">
								<label class="col-lg-3 control-label">Bank Detail</label>
								<div class="col-lg-5" style="margin-top:7px;">
									<select name="bank_detail" class="form-control">
										<option value="">Select Bank Branch</option>
										<?php foreach ($bank_result as $bank) { ?>
									    	<option value="<?php echo $bank->bank_id; ?>"><?php echo $bank->bank_name .' - '. $bank->bank_branch; ?></option>
									    <?php
											}
										?>
									</select>
								</div>
							</div>						

							<div class="form-group">
								<label class="col-lg-3 control-label">Cheque #</label>
								<div class="col-lg-5" style="margin-top:7px;">
									<input type="text" name="cheque" class="form-control">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-success btn-perspective btn-lg"  name="add_bill"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Supplier Bill</button>
							</div>
						</div>

					</fieldset>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>