<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$accounts = new accounts();
			if (isset($_POST['show_report'])) {	
				$to_date = $_POST['to_date'];
				$from_date = $_POST['from_date'];
				$supplier_name = $_POST['supplier_name'];
				$p_status = $_POST['p_status'];

				if($_POST['supplier_name']){
					$supplier_id = $_POST['supplier_name'];	
				} else {
					$supplier_id = NULL;
				}

				if($_POST['to_date']){
				$to_date = $_POST['to_date'];
				$to_date = $accounts->_date('Y-m-d H:i:s', $to_date);	
				} else {
					$to_date = NULL;
				}

				if($_POST['from_date']){
					$from_date = $_POST['from_date'];
					$from_date = $accounts->_date('Y-m-d H:i:s', $from_date);
				} else {
					$from_date = NULL;	
				} 

				$results = $accounts->get_payable_receviable_report($account = NULL, $account_type = $supplier_name, $to_date = $to_date, $from_date = $from_date, $type = 'payable', $status = $p_status, $bank = NULL);
			}
			?>			
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"> Account Payable Report </p>
			</div>
			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-3">	
				<div class="form-group">
					<label for="p_cost" class="col-sm-12">Start date: </label>
					<div class="col-sm-12">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input3" name="to_date" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>" /><br/>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-3">	
				<div class="form-group">
					<label for="p_name" class="col-sm-12">End Date: </label>
					<div class="col-sm-12">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>" /><br/>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-3">	
				<div class="form-group">
					<label for="p_supplier" class="col-sm-12">Supplier Name: </label>
					<?php 	$suppliers = new supplier();
							$all_suppliers = $suppliers->get_suppliers();
					?>
					<div class="col-sm-12">
						<select name="supplier_name">
							<option value="">Select Product</option>
							<?php 
							foreach($all_suppliers as $suppliers){ ?>					
									<option value="<?php echo $suppliers->sup_id; ?>" <?php if(isset($_POST['supplier_name']) && $_POST['supplier_name'] == $suppliers->sup_id){echo 'selected=selected';}?>><?php echo $suppliers->sup_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-3">	
				<div class="form-group">
					<label for="p_status" class="col-sm-12">Paid / Unpaid: </label>
					<div class="col-sm-12">
						<select name="p_status">
							<option value="">Select</option>
								<option value="0" <?php if(isset($_POST['p_status']) && $_POST['p_status'] == 0){echo 'selected=selected';}?>>Paid</option>
								<option value="1" <?php if(isset($_POST['p_status']) && $_POST['p_status'] == 1){echo 'selected=selected';}?>>Unpaid</option>
						</select>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="clear"></div>
			<div class="col-md-3">
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn submitBtn " name="show_report">Show Report</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
	
	<div class="container" style="margin-bottom:50px; text-align:center;">
		<div class="row">
			<?php 
			if (isset($results)) { 
			// print_f($results);
			?>
			<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
				<tr>
					<th>Payable Amount</th>
					<th>Payable Description</th>
					<th>Payable Type</th>
					<th>Payable Person Type</th>
					<th>Payable Bank</th>
					<th>Payable Due Date</th>
				</tr>
					<?php 
					$totalamount = 0;
					foreach($results as $res){ ?>
				<tr>
					<td><?php echo $amount = $res->pr_amount; ?></td>
					<td><?php echo $res->pr_description; ?></td>
					<td><?php echo $res->pr_account; ?></td>
					<td><?php echo $res->sup_name; ?></td>
					<td><?php echo $res->bank_name.' - '. $res->bank_branch;?></td>
					<td><?php echo $res->pr_due_date; ?></td>
				</tr>
					<?php
					$totalamount += $amount;
					}
					?>
				<tr>
					<td><strong><?php echo $totalamount; ?></strong></td>
					<td><strong>Total Amount</strong></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<?php }
			else {
				 // echo '<div class="alert alert-danger" role="alert"> No Result Found </div>';
			} ?>
	
		</div>
	</div>
	<div class="clear"></div>
</section>
<?php require_once 'footer.php'; ?>