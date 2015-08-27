<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View Supplier</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$bank = new bank();
				$results = $bank->get_banks();
				if ($results) {
				?>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Bank Name</th>
						<th>Branch</th>
						<th>Account #</th>
						<th>Account Title</th>
						<th>Account Type</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td>'. $res->bank_name .'</td>';
						echo '<td>'. $res->bank_branch.'</td>';
						echo '<td>'. $res->bank_account_no .'</td>';
						echo '<td>'. $res->bank_account_title .'</td>';
						echo '<td>'. $res->bank_account_type .'</td>';
						echo '<td class="alignCenter"><a href="add_bank.php?id='.$res->bank_id.'" class="btn btn-default">Edit</a></td>';
						echo '</tr>';
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