<?php require_once 'header.php'; ?>
<div class="page-content">
	<div class="container-fluid">

		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Reports</a></li>
			<li class="active">Account Payable Report</li>
		</ol>
		

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3>Account Payable Report</h3>
		  </div>
		  <div class="panel-body">
		<div class="the-box bg-primary no-border">
	  		<form class="form-horizontal dashboardForm"  action="" method="post">
				<div class="col-md-3">	
					<div class="form-group">
						<label for="p_cost" class="col-sm-12">Start date: </label>
						<div class="col-sm-12">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><i class="fa fa-calendar"></i></span>
			                </div>
							<input type="hidden" id="dtp_input3" name="to_date" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>" /><br/>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-3">	
					<div class="form-group">
						<label for="p_name" class="col-sm-12">Date: </label>
						<div class="col-sm-12">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><i class="fa fa-calendar"></i></span>
			                </div>
							<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>" /><br/>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-6">	
					<div class="form-group">
						<label for="p_supplier" class="col-sm-12">Supplier Name: </label>
						<?php 	$suppliers = new supplier();
								$all_suppliers = $suppliers->get_suppliers();
						?>
						<div class="col-sm-12">
							<select name="supplier_name" data-placeholder="Choose a Supplier Name" class="chosen-select form-control" tabindex="4">
								<option value=""></option>
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
				<div class="clearfix"></div>
				<div class="col-md-3">	
					<div class="form-group">
						<label for="p_status" class="col-sm-12">Paid / Unpaid: </label>
						<div class="col-sm-12">
							<select name="p_status" class="form-control">
								<option value="">Select</option>
									<option value="1" <?php if(isset($_POST['p_status']) && $_POST['p_status'] == 1){echo 'selected=selected';}?>>Paid</option>
									<option value="0" <?php if(isset($_POST['p_status']) && $_POST['p_status'] == 0){echo 'selected=selected';}?>>Unpaid</option>
							</select>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="p_status" class="col-sm-12">&nbsp;</label>
						<div class="col-sm-12">
							<button type="submit" class="btn btn-success btn-perspective" name="show_report">Show Report</button>
						</div>
				  	</div>
				</div>
				</form>
			<div class="clearfix" style="margin-bottom:10px;"></div>
		</div><!-- Box Close -->

		<div class="clearfix" style="margin-bottom:10px;"></div>
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
		<!-- Begin page heading -->
		

		<div class="the-box full no-border">
			<div class="table-responsive">
			<?php 
			if (isset($results)) { 
			// print_f($results);
			?>
			<table class="table table-th-block table-primary">
				<thead>
					<th>Payable Amount</th>
					<th>Payable Description</th>
					<th>Payable Type</th>
					<th>Payable Person Type</th>
					<th>Payable Bank</th>
					<th>Payable Due Date</th>
				</thead>
				<tbody>
					<?php 
					$totalamount = 0;
					foreach($results as $res){ ?>
				<tr>
					<td><?php echo $currency . $amount = $res->pr_amount; ?></td>
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
					<td><strong><?php echo $currency. $totalamount; ?></strong></td>
					<td><strong>Total Amount</strong></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				</tbody>
			</table>
			<?php }
			?>
			</div><!-- /.table-responsive -->
		</div>

		  </div><!-- /.panel-body -->
		</div>	  
	</div>
</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>