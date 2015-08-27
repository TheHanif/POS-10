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
				$supplier = new supplier();
				$results = $supplier->get_suppliers();
				if ($results) {
				?>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Supplier Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>City</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td>'. $res->sup_name .'</td>';
						echo '<td>'. $res->sup_email.'</td>';
						echo '<td>'. $res->sup_phone .'</td>';
						echo '<td>'. $res->sup_city .'</td>';
						echo '<td class="alignCenter"><a href="add_supplier.php?id='.$res->sup_id.'" class="btn btn-default">Edit Supplier</a> <a href="view_supplier_product.php?supplier_id='.$res->sup_id.'" class="btn btn-default">View Products</a></td>';
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