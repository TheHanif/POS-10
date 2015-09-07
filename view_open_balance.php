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
				$openingbalance = new openingbalance();
				$results = $openingbalance->get_opening_balance();
				if ($results) {
				?>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>User Name</th>
						<th>Amount</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td>'. $res->fname .' '.$res->lname.'</td>';
						echo '<td>'. $res->ob_balance.'</td>';
						echo '<td>'. $res->ob_date .'</td>';
						echo '<td class="alignCenter"><a href="add_opening_balance.php?id='.$res->ob_id.'" class="btn btn-default">Edit</a></td>';
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