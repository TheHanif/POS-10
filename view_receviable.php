<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">Account Receviable</p>
			</div>
			<div class="col-md-12">	
				<?php
				$accounts = new accounts();

				$results = $accounts->get_payable_receviable_report($account = NULL, $account_type = NULL, $to_date = NULL, $from_date = NULL, $type = 'receviable', $status = 0);
				if ($results) {
				//	print_f($results);
				?>
				<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Payable Amount</th>
						<th>Payable Description</th>
						<th>Payable Type</th>
						<th>Payable Person Type</th>
						<th>Payable Bank</th>
						<th>Payable Due Date</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){ ?>
						<tr>
						<td><?php echo $res->pr_amount; ?></td>
						<td><?php echo $res->pr_description; ?></td>
						<td><?php echo $res->pr_account; ?></td>
						<td><?php echo $res->sup_name; ?></td>
						<td><?php echo $res->bank_name.' - '. $res->bank_branch;?></td>
						<td><?php echo $res->pr_due_date; ?></td>
						<td><a href="#" class="btn btn-default">Received</a></td>
						</tr>
						<?php
						}
						?>
				</table>
				<?php
				}else{
					echo 'Error';
				} 
				?>
			</div>
		<div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>