<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="inventory.php">Inventory</a></li>
			<li class="active">Manage Inventory</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
			<div class="right-content">
				<a href="add_inventory.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD NEW ITEM</button></a>
			</div>
			<h3>Manage Inventory</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
				<?php 
				$inventory = new inventory();
				$results = $inventory->get_int();
				if ($results) {
				?>
				<table class="table table-striped table-hover" id="datatable-example">
					<thead class="the-box dark full">
						<tr>
							<th>Product Name</th>
							<th>Product Cost</th>
							<th>Product Price</th>
							<th>Product Quantity</th>
							<th>Product Barcode</th>
							<th>Product Date</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td><a href="add_inventory.php?id='.$res->inv_id.'">'. $res->p_name .'</a></td>';
						echo '<td>'. $res->inv_cost.'</td>';
						echo '<td>'. $res->inv_price .'</td>';
						echo '<td>'. $res->inv_quantity .'</td>';
						echo '<td><span class="label label-info">'. $res->inv_barcode .'</span></td>';
						echo '<td>'. $res->inv_ts .'</td>';
						echo '</tr>';
						}
						?>
					</tbody>
				</table>
				<?php
				}else{
					echo 'No Product Available in Inventory';
				} 
				?>
				</div><!-- /.table-responsive -->
			</div><!-- /.the-box .default -->
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>