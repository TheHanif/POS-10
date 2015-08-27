<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Purchase</p>
			</div>
			
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

			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="supplier_id" class="col-sm-3 control-label">Supplier Name: </label>
					<div class="col-sm-8" style="margin-top:7px;">
						<select name="supplier_id">
							<?php 
							foreach ($all_suppliers as $supplier) { ?>
							<option value="<?php echo $supplier->sup_id; ?>"><?php echo $supplier->sup_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="bill_number" class="col-sm-4 control-label">Bill Number: </label>
					<div class="col-sm-7">
						<input type="text" name="bill_number" value="" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="due_date" class="col-sm-3 control-label">Due Date: </label>
					<div class="col-sm-8">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="due_date" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="due_date" name="due_date" value="" /><br/>
					</div>
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="bill_amount" class="col-sm-4 control-label">Amount: </label>
					<div class="col-sm-7">
						<input type="text" name="bill_amount" value="" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="payment_type" class="col-sm-3 control-label">Payment Type: </label>
					<div class="col-sm-8" style="margin-top:7px;">
						<select name="payment_type">
							<option value="cash">Cash</option>
							<option value="cheque">Cheque</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-md-6">	
				<div class="form-group">
					<label for="bank_detail" class="col-sm-4 control-label">Bank Detail: </label>
					<div class="col-sm-7" style="margin-top:7px;">
						<select name="bank_detail">
							<option value="">Select Bank Branch</option>
							<?php foreach ($bank_result as $bank) { ?>
						    	<option value="<?php echo $bank->bank_id; ?>"><?php echo $bank->bank_name .' - '. $bank->bank_branch; ?></option>
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
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<button type="submit" class="btn submitBtn" name="add_bill"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Purchase</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>