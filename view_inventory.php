<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View Inventory</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$inventory = new inventory();
				$results = $inventory->get_int();
				if ($results) {
				?>
				<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Product Cost</th>
						<th>Product Price</th>
						<th>Product Quantity</th>
						<th>Product Barcode</th>
						<th>Product Date</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td>'. $res->inv_id .'</td>';
						echo '<td>'. $res->p_name .'</td>';
						echo '<td>'. $res->inv_cost.'</td>';
						echo '<td>'. $res->inv_price .'</td>';
						echo '<td>'. $res->inv_quantity .'</td>';
						echo '<td>'. $res->inv_barcode .'</td>';
						echo '<td>'. $res->inv_ts .'</td>';
						echo '<td><a href="add_inventory.php?id='.$res->inv_id.'"><span class="glyphicon glyphicon-pencil"></span></a></td>';
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