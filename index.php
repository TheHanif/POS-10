<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
			
			<div class="page-content">
				
				
				<div class="container-fluid">
					<!-- Begin page heading -->
					<div class="alert alert-info alert-bold-border square">
					  <h2>Manage Warehouse Product</h2>
					</div>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb info rsaquo">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="#fakelink">Table</a></li>
						<li class="active">Data table</li>
					</ol>
					<!-- End breadcrumb -->
					
					<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<?php
						$warehouse = new warehouse();
						$results = $warehouse->get_products();
						if ($results) {
						?>
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>Product Name</th>
									<th>Cost</th>
									<th>Price</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($results as $res){ ?>
								<tr>
									<td><a href="add_warehouse.php?id=<?php echo $res->warehouse_id; ?>"><?php echo $res->p_name; ?></a></td>
									<td><?php echo $res->warehouse_cost; ?></td>
									<td><?php echo $res->warehouse_price; ?></td>
									<td><?php echo $res->warehouse_quantity; ?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<?php
						}else{
							echo 'No Product Available in Warehouse';
						} 
						?>
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box .default -->
					<!-- END DATA TABLE -->
					
					
					
					
					
					
					
				
				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>