<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View Capital</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$accounts = new accounts();
				$results = $accounts->get_capital();
				if ($results) {
				?>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Capital Name</th>
						<th>Assets Amount</th>
						<th>Assets Date</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td>'. $res->capital_name .'</td>';
						echo '<td>'. $res->capital_amount.'</td>';
						echo '<td>'. $res->capital_date .'</td>';
						echo '<td class="alignCenter"><a href="add_capitals.php?id='.$res->capital_id.'" class="btn btn-default">Edit</a></td>';
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