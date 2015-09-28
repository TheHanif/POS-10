<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="accounts.php">Accounts</a></li>
			<li class="active">Account Receviable</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
		  	<h3>Account Receviable</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
					<?php
						$accounts = new accounts();

						$results = $accounts->get_payable_receviable_report($account = NULL, $account_type = NULL, $to_date = NULL, $from_date = NULL, $type = 'receviable', $status = 0);
						if ($results) {
						//	print_f($results);
						?>
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>Type</th>
									<th>Person Type</th>
									<th>Description</th>
									<th>Bank</th>
									<th>Amount</th>
									<th>Due Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($results as $res){ ?>
								<tr>
								<td><?php echo $res->pr_account; ?></td>
								<td><?php echo $res->sup_name; ?></td>
								<td><?php echo $res->pr_description; ?></td>
								<td><?php echo $res->bank_name.' - '. $res->bank_branch;?></td>
								<td><?php echo $currency.  $res->pr_amount; ?></td>
								<td><?php echo $res->pr_due_date; ?></td>
								<td><a href="#" class="btn btn-info active">Received</a></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<?php
						}else{
							echo '<div class="alert alert-danger" role="alert"> No Account Receviable Available. </div>';
						} 
						?>
					</div><!-- /.table-responsive -->
			</div><!-- /.the-box .default -->
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>