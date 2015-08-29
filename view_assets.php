<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View Assets</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$accounts = new accounts();
				$results = $accounts->get_assets();
				if ($results) {
				?>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Assets Type</th>
						<th>Assets Amount</th>
						<th>Assets Payment Mode</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td>'. $res->assets_type .'</td>';
						echo '<td>'. $res->assets_amount.'</td>';
						echo '<td>'. $res->assets_payment_mode .'</td>';
						echo '<td class="alignCenter"><a href="add_assets.php?id='.$res->assets_id.'" class="btn btn-default">Edit</a></td>';
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